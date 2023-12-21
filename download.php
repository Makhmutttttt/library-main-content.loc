<?

if(isset($_GET['id'])) {
    // Get the file details from the database using the ID
    include 'config.php'; // Adjust the path as needed
    $id = $_GET['id'];

    $query = "SELECT name, type, size, content, cover_image, name_on_site FROM upload WHERE id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id); // "i" indicates integer type for the ID
    
    if ($stmt->execute()) {
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($name, $type, $size, $content, $coverImage, $nameOnSite);
            $stmt->fetch();
            
            // Set headers for file download
            header("Content-length: $size");
            header("Content-type: $type");
            header("Content-Disposition: attachment; filename=$name");
            
            // Output the file content to the browser
            echo $content;

            // You can also use $coverImage and $nameOnSite as needed
            // For example, you can display the cover image and name on your site
            echo '<img src="data:image/jpeg;base64,'.base64_encode($coverImage).'" alt="Cover Image" width="100">';
            echo '<h3>' . $nameOnSite . '</h3>';
        } else {
            echo "File not found";
        }
    } else {
        echo 'Error, query failed: ' . $conn->error;
    }

    $stmt->close();
    $conn->close();
    exit;
}
