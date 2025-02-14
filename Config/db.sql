
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    image TEXT NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role VARCHAR(20) NOT NULL CHECK (role IN ('Organisateur', 'Participant', 'Admin')),
    status VARCHAR(10) NOT NULL CHECK (status IN ('Active', 'Inactive', 'Pending')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE category (
    category_id SERIAL PRIMARY KEY,
    nom VARCHAR(255) UNIQUE NOT NULL,
    description TEXT
);

CREATE TABLE tags (
    tag_id SERIAL PRIMARY KEY,
    nom VARCHAR(255) UNIQUE NOT NULL
);

CREATE TABLE events (
    event_id SERIAL PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    image TEXT NOT NULL,
    content_url VARCHAR(255) NOT NULL,  
    category_id INT NOT NULL,  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES category(category_id) ON DELETE CASCADE
);

CREATE TABLE event_tag (
    event_id INT NOT NULL,
    tag_id INT NOT NULL,
    CONSTRAINT fk_event FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    CONSTRAINT fk_tag FOREIGN KEY (tag_id) REFERENCES tags(tag_id) ON DELETE CASCADE
);

CREATE TABLE event_user (
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    role VARCHAR(20) NOT NULL CHECK (role IN ('Organisateur', 'Participant')), -- Associe le rôle dans l'événement
    CONSTRAINT fk_event FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
--! pas encore creer dans base de données
CREATE TABLE tickets (
    ticket_id SERIAL PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) NOT NULL CHECK (status IN ('Confirmed', 'Pending', 'Cancelled')),
    CONSTRAINT fk_event FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
--! pas encore creer dans base de données
CREATE TABLE payments (
    payment_id SERIAL PRIMARY KEY,
    ticket_id INT UNIQUE NOT NULL,
    user_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    payment_method VARCHAR(20) NOT NULL CHECK (payment_method IN ('Card', 'PayPal', 'BankTransfer')),
    payment_status VARCHAR(20) NOT NULL CHECK (payment_status IN ('Pending', 'Paid', 'Failed', 'Refunded')),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_ticket FOREIGN KEY (ticket_id) REFERENCES tickets(ticket_id) ON DELETE CASCADE,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
--! Modification du tableau `events` pour ajouter de nouvelles colonnes  
ALTER TABLE events  
ADD COLUMN description TEXT NOT NULL,  
ADD COLUMN event_date DATE NOT NULL,  
ADD COLUMN heure_debut TIME NOT NULL,  
ADD COLUMN heure_fin TIME NOT NULL,  
ADD COLUMN prix DECIMAL(10,2) DEFAULT 0.00;  

-- Modification du tableau tickets : ajout de colonnes pour le prix total, la quantité et la mise à jour du timestamp
ALTER TABLE tickets
ADD COLUMN prix_total DECIMAL(10, 2) DEFAULT 0.00,  
ADD COLUMN quantity INT DEFAULT 1,  




-- amine----------------
ALTER TABLE events
ADD COLUMN status VARCHAR(20) NOT NULL CHECK (status IN ('Active', 'Inactive', 'Pending'));
-- amine----------------


-- !MOHSEN----------
-- ajouter column 
alter table event_user
 Add column enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

-- drop column
 alter table event_user
drop column role

-- afficher les user organisateur qui cree un cours ou particpant qui inscris dans un cours
select u.nom ,e.titre from users u 
inner join event_user eu on u.user_id = eu.user_id
inner join events e on e.event_id = eu.event_id
where u.role = 'Organisateur';
-- !MOHSEN----------
