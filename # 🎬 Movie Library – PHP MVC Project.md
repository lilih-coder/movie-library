# 🎬 Movie Library – PHP MVC Project

## 📖 Project Description
The goal of this project is to create a **Movie Library web application** that allows users to view, filter, and rate movies.  
Each movie contains detailed information such as studio, director, category, and more.  
The project must follow **OOP** principles, the **MVC** design pattern, and the **PSR-1 PHP coding standard**.

---

## 🎯 Core Features

### 🧾 Movie Listing
The application should list movies with the following information:
- Film studio (e.g., Marvel, Disney, Warner Bros.)
- Director
- Category (Action, Drama, etc.)
- Age rating (e.g., PG-13)
- Language
- Subtitles (yes/no)
- Short description
- Main actors
- Official poster
- *(Bonus: Official trailer)*

---

### 🔍 Filtering
Users should be able to **filter movies** by:
- Selected actor  
- Film studio  
- Category  

---

### 🧰 CRUD Operations
All database tables must support **Create, Read, Update, and Delete** operations.  
Administrators should be able to add, edit, or remove:
- Movies  
- Studios  
- Directors  
- Categories  
- Actors  

---

### ⭐ Ratings
Users can rate each movie on a **1–5 scale**.  
- Ratings are stored in the database.  
- Each movie displays its **average rating**.  

---

## 🗃️ Database Structure

### Main Tables
- `studios` – Movie studios (e.g., Marvel, Disney)
- `directors` – Film directors
- `categories` – Movie genres
- `actors` – Main actors
- `movies` – Movie details (includes FK to studios, directors, categories)
- `movie_actors` – Relation table between movies and actors (many-to-many)
- `ratings` – Stores user ratings and optional comments

### Database Features
- Auto-increment IDs for all primary keys  
- Foreign key constraints for data consistency  
- Default average rating (`avg_rating`) stored as a computed or cached value  

---

## 🧱 Technical Requirements

- Programming language: **PHP**
- Architecture: **MVC (Model–View–Controller)**
- Coding standard: **PSR-1 (PHP-FIG)**
- Database: **MySQL**
- Version control: **Git**
- Frontend: **HTML, CSS, JavaScript (AJAX optional)**
- Initial data generation: **AI-based** (record AI interactions in `MI.txt`)

---

## 💾 Bonus Features
- Display **official movie trailers** (YouTube or Vimeo link)
- Responsive design using HTML + CSS
- Optional dark/light theme
- Search bar for movie titles or actor names

---

## 🧑‍💻 Setup Instructions

1. Clone the repository:  
   ```bash
   git clone https://github.com/<your-username>/<repo-name>.git
   cd <repo-name>
