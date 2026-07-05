import http from "http";
import fs from "fs";
import path from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const server = http.createServer((req, res) => {
 // Handle requests for static files (like CSS and JS)
  if (req.url.startsWith("/public/")) {
    const filePath = path.join(__dirname, req.url);
    const ext = path.extname(filePath);
    const contentType =
      ext === ".css"
        ? "text/css"
        : ext === ".js"
        ? "application/javascript"
        : "text/plain";

    fs.readFile(filePath, (err, data) => {
      if (err) {
        res.writeHead(404);
        res.end("File not found");
        return;
      }
      res.writeHead(200, { "Content-Type": contentType });
      res.end(data);
    });
    return;
  }

  // Handle page routes
  let filePath;
  if (req.url === "/" || req.url === "/index.html") {
    filePath = path.join(__dirname, "index.html");
  } else if (req.url === "/about") {
    filePath = path.join(__dirname, "about.html");
  } else if (req.url === "/contact") {
    filePath = path.join(__dirname, "contact.html");
  } else {
    filePath = path.join(__dirname, "404.html");
  }

  fs.readFile(filePath, (err, data) => {
    if (err) {
      res.writeHead(500, { "Content-Type": "text/plain" });
      res.end("Internal Server Error");
      return;
    }
    res.writeHead(200, { "Content-Type": "text/html" });
    res.end(data);
  });
});

const PORT = 3000;
server.listen(PORT, () => {
  console.log(`🌍 Server running at http://localhost:${PORT}/`);
});