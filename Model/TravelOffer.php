<?php
class OffreDeVoyage {
    private int $id;
    private string $titre;
    private string $destination;
    private DateTime $date_depart;
    private DateTime $date_retour;
    private float $prix;
    private bool $disponible;
    private string $categorie;

    public function __construct(int $id, string $titre, string $destination, string $date_depart, string $date_retour, float $prix, bool $disponible, string $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->destination = $destination;
        $this->date_depart = new DateTime($date_depart);
        $this->date_retour = new DateTime($date_retour);
        $this->prix = $prix;
        $this->disponible = $disponible;
        $this->categorie = $categorie;
    }

    public function afficherOffre(): void {
        echo "📌 Offre : {$this->titre}\n";
        echo "📍 Destination : {$this->destination}\n";
        echo "🛫 Départ : " . $this->date_depart->format('Y-m-d') . "\n";
        echo "🛬 Retour : " . $this->date_retour->format('Y-m-d') . "\n";
        echo "💰 Prix : {$this->prix} €\n";
        echo "✅ Disponible : " . ($this->disponible ? 'Oui' : 'Non') . "\n";
        echo "🏷 Catégorie : {$this->categorie}\n";
        echo "-----------------------------\n";
    }
}

// Exemple d'utilisation :
$offre = new OffreDeVoyage(1, "Voyage à Bali", "Bali, Indonésie", "2025-07-10", "2025-07-20", 1499.99, true, "Luxe");
$offre->afficherOffre();
?>