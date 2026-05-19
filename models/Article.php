<?php
    class Article{
        private int $id;
        private string $titre;
        private string $contenu;
        private string $auteur;
        private PDO  $db;

        public function __construct(PDO $db, array $data = [])
        {
            $this->db = $db; 
            if (!empty($data)){
                $this->id = $data['id'] ?? 0;
                $this->titre = $data['titre'] ?? '';
                $this->contenu = $data['contenu'] ?? '';
                $this->auteur = $data['auteur'] ?? '';
            }
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getTitre(): string
        {
            return $this->titre;
        }

        public function getContenu(): string
        {
            return $this->contenu;
        }

        public function getAuteur(): string
        {
            return $this->auteur;
        }

        public function setTitre(string $titre): void
        {
            $this->titre = $titre;
        }

        public function setContenu(string $contenu): void
        {
            $this->contenu = $contenu;
        }

        public function setAuteur(string $auteur): void
        {
            $this->auteur = $auteur;
        }

        public function create(): bool
        {
            try {
                // Vérifier si la table existe, sinon la créer
                $this->ensureTableExists();
                
                $sql = "INSERT INTO articles(titre, contenu, auteur)
                        VALUES (:titre, :contenu, :auteur)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':titre', $this->titre);
                $stmt->bindParam(':contenu', $this->contenu);
                $stmt->bindParam(':auteur', $this->auteur);

                return $stmt->execute();
            } catch (PDOException $e) {
                error_log("Erreur création article: " . $e->getMessage());
                return false;
            }
        }
        
        private function ensureTableExists(): void
        {
            $checkTable = $this->db->query("SHOW TABLES LIKE 'articles'");
            
            if ($checkTable->rowCount() === 0) {
                // Créer la table si elle n'existe pas
                $sql = "CREATE TABLE articles (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    titre VARCHAR(255) NOT NULL,
                    contenu TEXT NOT NULL,
                    auteur VARCHAR(100) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
                
                $this->db->exec($sql);
            }
        }
    }