
<?php
class TravelOffer
{

    private string $titre;
    private string $destination;
    private string $departureDate;
    private string $returnDate;
    private float $price;
    private int $availability;
    private string $category;
    public function __construct(string $titre, string $destination, string $departureDate, string $returnDate, float $price, int $availability, string $category)
    {
        $this->titre = $titre;
        $this->destination = $destination;
        $this->departureDate = $departureDate;
        $this->returnDate = $returnDate;
        $this->price = $price;
        $this->availability = $availability;
        $this->category = $category;
    }
    public function __distruct()
    {
        echo "TravelOffer is destroyed";
    }
    public function show()
    {
        echo "<table border='1'>
                  <tr>
                  <th>Title</th>
                  <th>Destination</th>
                  <th>Departure Date</th>
                  <th>Return Date</th>  
                  <th>Price</th>
                  <th>Availability</th>
                  <th>Category</th>
                  </tr>
                  <tr>
                    <td>$this->titre</td>
                    <td>$this->destination</td>
                    <td>$this->departureDate</td>
                    <td>$this->returnDate</td>
                    <td>$this->price</td>
                    <td>$this->availability</td>
                    <td>$this->category</td>
                  </tr>
        </table>";
    }
}



?>
