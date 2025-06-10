
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
![Screenshot 2025-05-13 183321](https://github.com/user-attachments/assets/75fb9714-b9c4-4555-a429-c9baa55db447)
![Screenshot 2025-05-13 183350](https://github.com/user-attachments/assets/05f4ded7-e179-4774-b1db-fd784a5d6215)
![Screenshot 2025-05-13 183425](https://github.com/user-attachments/assets/1e6b5e43-b72d-4064-a16f-1e42b6a262b3)


- **User Dashboards**: Tailored interfaces for job seekers and employers.
![Screenshot 2025-05-13 185319](https://github.com/user-attachments/assets/d09105c5-44e2-4e2f-86b5-988d2bb55836)
![Screenshot 2025-05-13 185010](https://github.com/user-attachments/assets/4474d8dc-4b2c-4df0-bbe7-e54c962791c9)

- **Job Management**: Employers can post and manage jobs; admins oversee listings.
![Screenshot 2025-05-12 232221](https://github.com/user-attachments/assets/3d4c6c70-b655-4b20-aaf4-48a87cc1664d)
![Screenshot 2025-05-12 232337](https://github.com/user-attachments/assets/a21f7d6e-6888-48a2-85f6-8f404a768244)
![Screenshot 2025-05-12 232059](https://github.com/user-attachments/assets/5c3a5546-c65b-4d9b-8ccb-a5ae0e8e3131)


## License
This project is licensed under the MIT License. See the `LICENSE` file for details.

## Contact
For questions or support, please contact:
📧 **Email**: [dulagudeta22@gmail.com]  
🌐 **GitHub**: [github.com/dulagudeta](https://github.com/dulagudeta)
```
