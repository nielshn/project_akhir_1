# Internal Audit Unit Information System Website for Del Institute of Technology

This project aims to develop an efficient and effective internal audit system for Del Institute of Technology. The system enhances oversight efficiency and reduces resource usage. It minimizes human errors, such as neglect in inspections or misinterpretations of data, enabling the Institute to monitor and evaluate compliance with procedures and rules more accurately and transparently.

## Features

1. **User Authentication**
   - Admin login to the system

2. **Content Management**
   - Manage articles
   - Manage meta
   - Manage gallery
   - Manage files
   - Manage FAQ
   - Manage announcements
   - Manage news
   - Manage downloadable files
   - Manage events
   - Manage categories

3. **Reports and Notifications**
   - View report forms
   - View notifications
   - Fill report forms

4. **Public Access**
   - View events
   - View news
   - View announcements
   - View gallery
   - View vision and mission
   - View duties and functions
   - View history
   - View responsibilities and authorities
   - View personnel
   - View goals and scope
   - View organizational structure
   - View contacts
   - Download files

## Getting Started

### Prerequisites

Ensure you have the following installed:
- PHP (>= 7.4)
- Composer
- Node.js and NPM
- MySQL or any other database

### Installation

1. **Clone the Repository**

```bash
git clone https://github.com/nielshn/project_akhir_1.git
cd project_akhir_1
```
2. **Install Depedencies**
```bash
composer install
npm install
```
3. **Setup Environment Variables**
```bash
cp .env.example .env
```
Update the .env file with your database credentials and other necessary configurations.
4. **Generate Application Key**
```bash
php artisan key:generate
```
5. **Migrate and Seed Database
```
php artisan migrate --seed
```
6. **Compile Assets
```
npm run dev
```
7. Running the Application
```
php artisan serve
```
## Contributing

If you wish to contribute to the project, please fork the repository and use a feature branch. Pull requests are warmly welcome.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/feature-name`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/feature-name`)
5. Create a new Pull Request

## Contact
For any queries, please contact:

- **Name**: Daniel Siahaan
- **LinkedIn**: [Daniel Siahaan](https://www.linkedin.com/in/daniel-siahaan-ab03b6204/)

