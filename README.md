# CareerBridge
### Bridging Skills to Opportunities

**CareerBridge: Skill-Based Scholarship, Internship & Competition Hub**

CareerBridge is a web-based platform designed to bridge the gap between students' skills and career development opportunities. The platform helps students discover relevant scholarships, internships, and competitions based on their skills, interests, and academic profiles.

By providing a centralized platform for opportunity discovery, skill-based recommendations, and teammate matching, CareerBridge aims to make career development more accessible, personalized, and collaborative for university students.

---

## 1. Background

University students often face challenges when searching for scholarships, internships, and competitions that align with their skills and interests. Information is scattered across multiple platforms, making opportunity discovery time-consuming and inefficient.

Furthermore, students may struggle to find teammates with complementary skills when participating in competitions or collaborative programs.

CareerBridge addresses these challenges by providing an integrated platform that connects students with relevant opportunities and potential collaborators.

## 2. Key Features

### 2.1. Skill-Based Opportunity Discovery
- Discover scholarships, internships, competitions, and training programs in one platform.
- Explore opportunities based on categories and requirements.
- Find opportunities that align with individual skills and interests.

### 2.2. Personalized Recommendations
- Analyze student profiles and skill information.
- Provide relevant opportunity recommendations.
- Help students identify opportunities that match their capabilities.

### 2.3. Teammate Matching
- Discover other students based on their skills and interests.
- Find potential teammates for competitions and collaborative projects.
- Support team formation through skill-based connections.

### 2.4. Student Profile Management
- Create and manage personal student profiles.
- Showcase skills, interests, and academic backgrounds.
- Manage resumes and supporting documents.

### 2.5. Opportunity Management
- Enable organizers to publish and manage opportunities.
- Provide structured opportunity information.
- Support opportunity management through an organizer dashboard.

### 2.6. Administrative Management
- Manage users, organizers, and platform information.
- Monitor published opportunities.
- Manage platform configurations and administrative activities.

## 3. Target Users

CareerBridge is designed for three primary user groups:

| User | Description |
|---|---|
| Students | Discover opportunities, manage profiles, receive recommendations, and find teammates. |
| Organizers | Publish and manage scholarships, internships, competitions, and other opportunities. |
| Administrators | Manage platform users, organizers, opportunities, and system configurations. |

## 4. Technology Stack

CareerBridge is developed using the following technologies:

| Technology | Purpose |
|---|---|
| PHP 8.4+ | Backend programming language |
| Laravel 13 | Backend framework |
| MySQL | Relational database |
| Blade | Server-side templating |
| Tailwind CSS | UI styling and responsive design |
| Alpine.js | Lightweight frontend interactivity |
| JavaScript | Client-side functionality |
| Vite | Frontend asset bundling |
| Composer | PHP dependency management |
| NPM | JavaScript dependency management |

## 5. System Architecture

CareerBridge follows a Laravel-based architecture that separates application responsibilities into several components:

- **Presentation Layer:** Blade templates, Tailwind CSS, Alpine.js, and JavaScript.
- **Application Layer:** Laravel controllers, services, middleware, and business logic.
- **Data Layer:** MySQL database and Laravel Eloquent ORM.
- **Storage Layer:** File storage for resumes, profile documents, and opportunity posters.

The application also implements role-based access control to provide different functionalities for students, organizers, and administrators.

## 6. Installation and Setup

Follow these instructions to run CareerBridge locally.

### Prerequisites

Make sure the following tools are installed:

- PHP 8.4 or later
- Composer
- Node.js and NPM
- MySQL
- Git

### Step 1. Clone the Repository

```bash
git clone <repository-url>
```

Navigate to the project directory:

```bash
cd CareerBridge
```

### Step 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

### Step 3. Configure Environment

Create your environment configuration file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Configure your database credentials in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=careerbridge
DB_USERNAME=root
DB_PASSWORD=
```

Create a MySQL database named `careerbridge` before proceeding.

### Step 4. Run Database Migrations

Execute the database migrations:

```bash
php artisan migrate
```

If the project provides seeders, run:

```bash
php artisan db:seed
```

### Step 5. Build Frontend Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### Step 6. Start the Application

Run the Laravel development server:

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

## 7. Project Structure

The project follows Laravel's standard directory structure.

```text
CareerBridge/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Services/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

## 8. User Roles

CareerBridge implements role-based access control to ensure that each user can access the appropriate features.

- **Super Admin:** Responsible for managing the overall platform.
- **Organizer:** Responsible for publishing and managing opportunities.
- **Student / Participant:** Responsible for managing personal profiles, discovering opportunities, and finding teammates.
- **Public:** Can explore publicly available information and opportunities.

## 9. Project Team

**Team Name: 404: Boys Not Found**

| Name | Role |
|---|---|
| Audy Zahra Aditya Putri | Team Leader |
| Virna Nanju Fernanda | Team Member |
| Evi Meliyani | Team Member |
| Irawati | Team Member |

## 10. Project Vision

CareerBridge envisions a more connected and accessible ecosystem where every student can recognize their potential, develop their skills, and discover opportunities that support their future.

We believe that opportunities should not be limited by information gaps or difficulties in finding the right collaborators.

**CareerBridge — Bridging Skills to Opportunities.**

---

## 11. Acknowledgements

Developed as a technology innovation project for the GDG on Campus ITB competition.

**Team 404: Boys Not Found**
