# postMessage 'null' window.origin PoC

Showcasing the trick described in the page below in a vulnerable application:
https://book.jorianwoltjer.com/languages/javascript/postmessage-exploitation#bypassing-window.origin-using-null-origin

## Showcase

https://github.com/JorianWoltjer/postmessage-null-poc/assets/26067369/d9fd8bc0-b57f-407c-9774-7eb8b6a11ba1

## Running

Host the application quickly using the following command:

```bash
php -S 0.0.0.0:8000
```

Then visit the vulnerable domain at http://localhost:8000, and the attacker's domain at http://127.0.0.1:8000/exploit.html.  
These domains point to the same PHP server but are considered different origins.
