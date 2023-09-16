CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    emailSubject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);
