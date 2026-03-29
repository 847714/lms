import asyncio
import aiohttp
import time
import statistics

# Configuration
URLS = [
    "http://localhost:8080/login.php",
    "http://localhost:8080/index.php", # Will redirect to login without cookie, which is fine for load testing
    "http://localhost:8080/style.css"
]
TOTAL_REQUESTS = 500
CONCURRENCY = 50

async def fetch(session, url):
    start_time = time.time()
    try:
        async with session.get(url, timeout=5) as response:
            await response.read()
            return response.status, time.time() - start_time
    except Exception as e:
        return 0, time.time() - start_time

async def worker(queue, results, session):
    while not queue.empty():
        url = await queue.get()
        status, duration = await fetch(session, url)
        results.append({"status": status, "duration": duration})
        queue.task_done()

async def main():
    print(f"Starting stress test: {TOTAL_REQUESTS} total requests, {CONCURRENCY} concurrent workers")
    queue = asyncio.Queue()
    results = []

    # Populate queue
    for i in range(TOTAL_REQUESTS):
        queue.put_nowait(URLS[i % len(URLS)])

    start_time = time.time()

    async with aiohttp.ClientSession() as session:
        tasks = []
        for _ in range(CONCURRENCY):
            task = asyncio.create_task(worker(queue, results, session))
            tasks.append(task)

        await queue.join()

        # Cancel workers (though they should exit anyway)
        for task in tasks:
            task.cancel()

    total_time = time.time() - start_time

    # Analyze results
    success_count = sum(1 for r in results if r["status"] in (200, 302))
    error_count = TOTAL_REQUESTS - success_count
    durations = [r["duration"] for r in results]

    avg_duration = statistics.mean(durations)
    max_duration = max(durations)
    requests_per_sec = TOTAL_REQUESTS / total_time

    print(f"\n--- Stress Test Results ---")
    print(f"Total Requests: {TOTAL_REQUESTS}")
    print(f"Successful Requests: {success_count} ({success_count/TOTAL_REQUESTS*100:.2f}%)")
    print(f"Failed Requests: {error_count}")
    print(f"Total Time Elapsed: {total_time:.2f} seconds")
    print(f"Requests Per Second: {requests_per_sec:.2f} rps")
    print(f"Average Response Time: {avg_duration*1000:.2f} ms")
    print(f"Max Response Time: {max_duration*1000:.2f} ms")

if __name__ == "__main__":
    asyncio.run(main())
