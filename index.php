<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Countdown Timer</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #111827;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 200px;
  }
  #timer {
    font-size: 42px;
    font-weight: bold;
  }
</style>
</head>
<body>
<div id="timer">Loading…</div>

<script>
  const params = new URLSearchParams(window.location.search);
  const duration = Number(params.get("duration")) || 86400; // seconds
  const targetTime = Date.now() + duration * 1000;

  function tick() {
    const now = Date.now();
    const diff = targetTime - now;

    if(diff <= 0) {
      document.getElementById("timer").textContent = "EXPIRED";
      return;
    }

    const d = Math.floor(diff / 86400000);
    const h = Math.floor((diff / 3600000) % 24);
    const m = Math.floor((diff / 60000) % 60);
    const s = Math.floor((diff / 1000) % 60);

    document.getElementById("timer").textContent =
      `${d}d ${h}h ${m}m ${s}s`;
  }

  tick();
  setInterval(tick, 1000);
</script>
</body>
</html>

