<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handling GET request to retrieve data
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query to retrieve data based on ID
        $query = "SELECT * FROM produksi WHERE id = $id";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Error: " . mysqli_error($koneksi));
        }

        $data = mysqli_fetch_assoc($result);

        // Returning data in JSON format
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        // If no ID parameter is provided, return all data
        $query = "SELECT * FROM produksi";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Error: " . mysqli_error($koneksi));
        }

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Returning data in JSON format
        header('Content-Type: application/json');
        echo json_encode($data);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handling DELETE request to delete data
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Perform the DELETE query on the database
        $query = "DELETE FROM produksi WHERE id = $id";

        if (mysqli_query($koneksi, $query)) {
            // Deletion successful
            $response = array('status' => 'success', 'message' => 'Record deleted successfully.');
            echo json_encode($response);
        } else {
            // Deletion failed
            $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($koneksi));
            echo json_encode($response);
        }
    } else {
        // No ID provided for deletion
        echo json_encode(array('status' => 'error', 'message' => 'No ID provided for deletion.'));
    }
} else {
    // Invalid request method
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
