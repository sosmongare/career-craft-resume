# CareerCraft Resume Application

This is a Laravel-based application that allows users to create and manage resumes using different templates. Users can log in, select a template, add various sections (including custom sections), and download their resume as a PDF.

## Features

- User authentication (login/signup)
- Select from multiple resume templates
- Add standard sections (e.g., Work Experience, Education, Skills)
- Add custom sections (e.g., Certifications, Awards)
- Download resume as a PDF

## Requirements

- PHP >= 7.4
- Composer
- MySQL
- Laravel 8.x
- Laravel Passport (for authentication)
- DomPDF (for PDF generation)

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/sosmongare/career-craft-resume.git
   cd career-craft-resume
   ```

2. **Install dependencies:**

   ```bash
   composer install
   ```

3. **Set up environment variables:**

   Copy the `.env.example` file to `.env` and update the database credentials and other settings:

   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**

   ```bash
   php artisan migrate
   ```

6. **Run the application:**

   ```bash
   php artisan serve
   ```

## Usage

1. **Register and log in:**

   Create a new user account or log in with an existing account.

2. **Select a resume template:**

   Choose a template from the available options.

3. **Add resume details:**

   Enter information for various sections such as Work Experience, Education, Skills, and any custom sections you want to add.

4. **Download the resume:**

   Once you've entered all the details, download the resume as a PDF.

## API Endpoints

### Authentication

- **Register:** `POST /api/register`
- **Login:** `POST /api/login`

### Templates

- **Get all templates:** `GET /api/templates`
- **Get a specific template:** `GET /api/templates/{id}`

### Resumes

- **Get all resumes:** `GET /api/resumes`
- **Create a new resume:** `POST /api/resumes`
- **Get a specific resume:** `GET /api/resumes/{id}`
- **Update a resume:** `PUT /api/resumes/{id}`
- **Download resume as PDF:** `SHOW /api/resumes/{id}`

## Example JSON Payload for Creating a Resume

```json
{
    "template_id": 1,
    "data": {
        "name": "Sospeter Mongare",
        "contact_info": {
            "address": "123 Main St, Nairobi, Kenya",
            "linkedin": "https://www.linkedin.com/in/sosmongare",
            "email": "sosmongare@gmail.com",
            "mobile_number": "+254 708 920 430",
            "github": "https://github.com/sosmongare"
        },
        "career_objectives": "To leverage my skills in software development to contribute to impactful projects.",
        "work_experience": [
            {
                "title": "Software Engineer",
                "company": "ABC Corp",
                "location": "Nairobi, Kenya",
                "start_date": "Jan 2020",
                "end_date": "Present",
                "responsibilities": "Developed various applications and improved performance."
            }
        ],
        "education": [
            {
                "degree": "BSc in Software Engineering",
                "institution": "XYZ University",
                "location": "Nairobi, Kenya",
                "start_date": "Sep 2015",
                "end_date": "Aug 2019"
            }
        ],
        "skills": ["Python", "Django", "Laravel", "MySQL"],
        "projects": [
            {
                "title": "Project Name",
                "description": "Detailed description of the project."
            }
        ],
        "custom_sections": {
            "certifications": [
                {
                    "title": "Certified Laravel Developer",
                    "description": "Certification by Laravel Certification Board"
                }
            ]
        },
        "references": [
            {
                "name": "Jane Smith",
                "contact": "+254 700 123 456",
                "email": "janesmith@example.com"
            }
        ]
    }
}
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request with your changes. 


## Contact

For any questions or feedback, please contact:

- Sospeter Mongare
- Email: sosmongare@gmail.com
- Whatsapp: +254708920430
