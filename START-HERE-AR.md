# ابدأ من هنا

هذا المشروع مجهز لتشغيل Laravel 12 + Livewire داخل Docker.

1. ثبّت Docker Desktop وشغّله.
2. افتح PowerShell داخل مجلد المشروع.
3. نفّذ: `docker compose up --build -d`
4. افتح: http://localhost:8000

مهم:
- أول بناء يحتاج إنترنت لتنزيل Laravel وLivewire عبر Composer.
- قاعدة البيانات SQLite وتُحفظ في Docker volume.
- مجلد `src/` يحتوي ملفات التطبيق التي أضفناها فوق هيكل Laravel الأساسي.
- بعد نجاح التشغيل، التقط صور الإثبات وضعها في `docs/screenshots/`.
- قبل التسليم، أنشئ مستودع GitHub خاصاً بك وعدّل رابط الاستنساخ في README.
