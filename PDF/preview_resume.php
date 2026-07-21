<?php
/**
 * preview_resume.php
 *
 * Simple HTML preview page that embeds the generated PDF and provides a
 * download button that forces the PDF to be downloaded.
 */
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Resume Preview</title>
  <style>
    body { margin: 0; font-family: Arial, Helvetica, sans-serif; }
    .toolbar { display:flex; gap:12px; padding:12px; align-items:center; background:#f7f7f7; border-bottom:1px solid #eee; }
    .btn { display:inline-block; padding:8px 12px; background:#444; color:#fff; text-decoration:none; border-radius:6px; }
    .container { height: calc(100vh - 56px); }
    iframe { width:100%; height:100%; border:0; }
  </style>
</head>
<body>
  <div class="toolbar">
    <a class="btn" href="generate_resume.php?download=1">Download PDF</a>
    <a class="btn" href="/">Back to site</a>
    <div style="flex:1"></div>
    <div style="color:#666">Preview (generated on the fly)</div>
  </div>

  <div class="container">
    <iframe src="generate_resume.php?inline=1" title="Resume preview"></iframe>
  </div>
</body>
</html>
