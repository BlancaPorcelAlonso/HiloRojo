<?php
session_start();
$eventController = new EventController();

// A) Lógica para los eventos (GET)
if (isset($_GET["action"])) {
    if ($_GET["action"] == "list_events") {
        $eventController->listEvents();
    }
    if ($_GET["action"] == "view_event") {
        $eventId = $_GET["id"] ?? null;
        $eventController->viewEvent($eventId);
    }
    if ($_GET["action"] == "edit_event") {
        $eventId = $_GET["id"] ?? null;
        $eventController->editEventForm($eventId);
    }
    if ($_GET["action"] == "delete_event") {
        $eventId = $_GET["id"] ?? null;
        $eventController->deleteEvent($eventId);
    }
}

// B) Lógica para formularios (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create_event"])) {
        $eventController->createEvent();
    }
    if (isset($_POST["update_event"])) {
        $eventController->updateEvent();
    }
}

class EventController
{
    public $conn;

    public function __construct()
    {
        $servername = "sql7.freesqldatabase.com";
        $username = "sql7824380";
        $contrasena = "66E6mahs6E";
        $dbname = "sql7824380";

        try {
            $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  // Modo de errores
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,  // Modo de fetch
                PDO::ATTR_EMULATE_PREPARES => false  // No emular prepared statements
            ];
            $pdo = new PDO($dsn, $username, $contrasena, $opciones);
            $this->conn = $pdo;

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function listEvents(): void
    {
        // Assuming events table has id, title, description, date, location, created_by
        $sql = "SELECT * FROM events ORDER BY date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll();

        // For now, just redirect or output, but typically you'd include a view
        // Since this is controller only, perhaps set session or redirect
        $_SESSION['events'] = $events;
        header("Location: /HiloRojo/view/index.php"); // Assuming index lists events
        exit;
    }

    public function viewEvent($eventId): void
    {
        if (!$eventId) {
            header("Location: /HiloRojo/view/index.php?error=invalid_event");
            exit;
        }

        $sql = "SELECT * FROM events WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$eventId]);
        $event = $stmt->fetch();

        if (!$event) {
            header("Location: /HiloRojo/view/index.php?error=event_not_found");
            exit;
        }

        $_SESSION['current_event'] = $event;
        // Redirect to a view event page, assuming VerEvento or something
        header("Location: /HiloRojo/view/VerEvento.php?id=" . $eventId);
        exit;
    }

    public function createEvent(): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
            exit;
        }

        $title = trim($_POST["title"] ?? "");
        $description = trim($_POST["description"] ?? "");
        $date = $_POST["date"] ?? "";
        $location = trim($_POST["location"] ?? "");
        $created_by = $_SESSION["user_id"];

        if (empty($title) || empty($description) || empty($date) || empty($location)) {
            header("Location: /HiloRojo/view/formularios/formulario_crear_eventos.php?error=missing_fields");
            exit;
        }

        $sql = "INSERT INTO events (title, description, date, location, created_by) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute([$title, $description, $date, $location, $created_by])) {
            header("Location: /HiloRojo/view/index.php?message=event_created");
        } else {
            header("Location: /HiloRojo/view/formularios/formulario_crear_eventos.php?error=db_error");
        }
        exit;
    }

    public function editEventForm($eventId): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
            exit;
        }

        if (!$eventId) {
            header("Location: /HiloRojo/view/index.php?error=invalid_event");
            exit;
        }

        $sql = "SELECT * FROM events WHERE id = ? AND created_by = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$eventId, $_SESSION["user_id"]]);
        $event = $stmt->fetch();

        if (!$event) {
            header("Location: /HiloRojo/view/index.php?error=event_not_found_or_not_owner");
            exit;
        }

        $_SESSION['edit_event'] = $event;
        header("Location: /HiloRojo/view/formularios/formulario_editar_eventos.php?id=" . $eventId);
        exit;
    }

    public function updateEvent(): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
            exit;
        }

        $eventId = $_POST["event_id"] ?? null;
        $title = trim($_POST["title"] ?? "");
        $description = trim($_POST["description"] ?? "");
        $date = $_POST["date"] ?? "";
        $location = trim($_POST["location"] ?? "");

        if (!$eventId || empty($title) || empty($description) || empty($date) || empty($location)) {
            header("Location: /HiloRojo/view/formularios/formulario_editar_eventos.php?error=missing_fields");
            exit;
        }

        $sql = "UPDATE events SET title = ?, description = ?, date = ?, location = ? WHERE id = ? AND created_by = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute([$title, $description, $date, $location, $eventId, $_SESSION["user_id"]])) {
            header("Location: /HiloRojo/view/index.php?message=event_updated");
        } else {
            header("Location: /HiloRojo/view/formularios/formulario_editar_eventos.php?error=db_error");
        }
        exit;
    }

    public function deleteEvent($eventId): void
    {
        if (!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true) {
            header("Location: /HiloRojo/view/formularios/formulario_inicio_sesion_usuario.php");
            exit;
        }

        if (!$eventId) {
            header("Location: /HiloRojo/view/index.php?error=invalid_event");
            exit;
        }

        $sql = "DELETE FROM events WHERE id = ? AND created_by = ?";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute([$eventId, $_SESSION["user_id"]])) {
            header("Location: /HiloRojo/view/index.php?message=event_deleted");
        } else {
            header("Location: /HiloRojo/view/index.php?error=delete_failed");
        }
        exit;
    }
}
?>