
# Job Portal System 

## Project Overview
The **Job Portal Web Application** is a dynamic platform designed to simplify the job search and recruitment process by connecting job seekers, employers, and administrators. It features multilingual support (English, Afaan Oromoo, and Amharic) and offers a centralized system for job postings, applications, and recruitment management.

## Key Features
- **Multilingual Support**: Choose between English, Afaan Oromoo, or Amharic for an inclusive user experience.
- **User Roles**:
  - **Administrators**: Manage users, job listings, and platform analytics.
  - **Employers**: Post jobs, review applications, and manage recruitment.
  - **Job Seekers**: Search and apply for jobs, track application status, and receive notifications.
- **Auto Content Filtering**: Ensures job posts meet platform standards.
- **Real-Time Notifications**: Keeps users updated on job opportunities and application statuses.
- **Interactive Dashboards**: Tailored for each user role with intuitive navigation.

## Technologies Used
- **Frontend**: HTML/CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Additional Tools**: Git for version control

## Installation Guide
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/job-portal-system.git
   ```
2. **Set Up the Database**:
   - Import the provided SQL file (`database.sql`) into your MySQL server.
   - **Define an Admin User**: Run the following SQL query to create an admin account:
     ```sql
     INSERT INTO users (name, email, password, role)
     VALUES ("Admin", "admin@gmail.com", "admin1234", "admin");
     ```
3. **Configure the Environment**:
   - Update database credentials in `config.php`.
4. **Run the Application**:
   - Deploy the project on a web server (e.g., Apache, Nginx) or use a local development environment like XAMPP.

## Usage
1. **For Job Seekers**:
   - Register an account, complete your profile, and upload your resume.
   - Browse and apply for jobs, and track your applications.
2. **For Employers**:
   - Register as an employer, post job listings, and manage applications.
3. **For Administrators**:
   - Log in using the admin credentials (`admin@gmail.com` / `admin1234`).
   - Access the admin dashboard to manage users, job listings, and monitor platform activity.

## Screenshots
- **Home Page**: Multilingual landing page with job search functionality.
![Screenshot 2025-05-13 183425](https://github.com/user-attachments/assets/cc531636-396d-4212-be10-c087ae68130d)
![Screenshot 2025-05-13 183350](https://github.com/user-attachments/assets/dc6219eb-2303-45fc-8f38-ed628bc49df8)
![Screenshot 2025-05-13 183321](https://github.com/user-attachments/assets/fbd70c77-246c-4f45-9f82-9b53bdcc8c7e)
- **User Dashboards**: Tailored interfaces for job seekers and employers.
- ![Screenshot 2025-05-13 185010](https://github.com/user-attachments/assets/fa0f49c7-fcd6-446b-92ec-68597a83cbb0)
![Screenshot 2025-05-13 185319](https://github.com/user-attachments/assets/b4333a31-d6f4-44a0-bea9-c70b82ef587c)
- **Job Management**: Employers can post and manage jobs; admins oversee listings.
![Screenshot 2025-05-12 232221](https://github.com/user-attachments/assets/589c6167-e93d-41b5-a6b7-a0cd0e001422)
![Screenshot 2025-05-12 232337](https://github.com/user-attachments/assets/0ff8177b-cdeb-4347-8642-5dfb6b89b7ac)
![Screenshot 2025-05-12 232355](https://github.com/user-attachments/assets/e75f1f63-e819-4ed9-8893-23aa12e16f4a)

## License
This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact
For questions or support, please contact:
📧 **Email**: [dulagudeta22@gmail.com]  
🌐 **GitHub**: [github.com/dulagudeta](https://github.com/dulagudeta)
```
