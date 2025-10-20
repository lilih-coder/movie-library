project/
├─ App/
│   ├─ Models/
│   │    ├─ Film.php
│   │    ├─ Studio.php
│   │    ├─ Director.php
│   │    ├─ Category.php
│   │    ├─ Actor.php
│   │    └─ Rating.php
│   │
│   ├─ Interfaces/
│   │    └─ FilmRepositoryInterface.php
│   │
│   ├─ Database/
│   │    └─ Database.php
│   │
│   ├─ Routing/
│   │    └─ Router.php
│   │
│   ├─ Controllers/
│   │    ├─ BaseController.php
│   │    └─ FilmController.php
│   │
│   └─ Views/
│        ├─ films/
│        │    ├─ list.php
│        │    ├─ detail.php
│        │    └─ form.php       # új film hozzáadása / szerkesztés
│        └─ layouts/
│             ├─ header.php
│             └─ footer.php
│
├─ Public/
│   ├─ CSS/
│   │    └─ style.css
│   ├─ images/                  # poszterek
│   └─ index.php                 # front controller
│
├─ Config/
│   └─ config.php               # DB beállítások, app config
│
├─ Vendor/                      # Composer csomagok
│
├─ MI.txt                       # MI promptok / adatok generálása
│
└─ sql/
    └─ movies_db.sql      
