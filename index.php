<?php
require_once 'Autoload.php';

use Controllers\Base\BaseController;
use Controllers\ContactController;
use Controllers\CategoryController;

session_start();

$contactController  = new ContactController();
$categoryController = new CategoryController();

define('URL', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . "/");

function base_url(string|null $address = NULL): string
{
    return URL . $address;
}

ob_start();

$params = isset($_GET['page']) ? explode('/', $_GET['page'], FILTER_SANITIZE_URL) : ['home'];
$page   = $params[0];
$action = isset($params[1]) ? strtolower($params[1]) : null;
$id     = isset($params[2]) ? $params[2] : null;
$title  = 'Mon annuaire';

switch ($page) 
{
    case 'home':
        $title .= " | " . ucfirst($page);
        BaseController::home();
        break;

    case 'contacts':
        $title .= " | " . ucfirst($page);
        $contactController->index();
        break;

    case 'contact':
        switch($action)
        {
            case 'ajouter':
                $title .= " | " . ucfirst($action) . " " . ucfirst($page);
                $contactController->add();
                break;
        
            case 'modifier':
                $title .= " | " . ucfirst($action) . " " . ucfirst($page);
                ($id) ? $contactController->edit($id) : BaseController::error404();
                break;
        
            case 'sauver':
                ($id) ? $contactController->save($id) : $contactController->save();
                break;
        
            case 'info':
                $title .= " | " . ucfirst($page);
                ($id) ? $contactController->view($id) : BaseController::error404();
                break;
        
            case 'supprimer':
                ($id) ? $contactController->delete($id) : BaseController::error404();
                break;

            default:
                $title = " Page Introuvable";
                BaseController::error404();
                break;
        }
        break;

    case 'categories':
        $title .= " | " . ucfirst($page);
        $categoryController->index();
        break;

    case 'categorie':
        switch($action)
        {
            case 'ajouter':
                $title .= " | " . ucfirst($action) . " " . ucfirst($page);
                $categoryController->add();
                break;
        
            case 'modifier':
                $title .= " | " . ucfirst($action) . " " . ucfirst($page);
                ($id) ? $categoryController->edit($id) : BaseController::error404();
                break;
        
            case 'sauver':
                ($id) ? $categoryController->save($id) : $categoryController->save();
                break;
        
            case 'info':
                $title .= " | " . ucfirst($action) . " " . ucfirst($page);
                ($id) ? $categoryController->view($id) : BaseController::error404();
                break;
        
            case 'supprimer':
                ($id) ? $categoryController->delete($id) : BaseController::error404();
                break;
    
            default:
                $title = " Page Introuvable";
                BaseController::error404();
                break;
        }
        break;

    default:
        $title = " Page Introuvable";
        BaseController::error404();
        break;
}

$content = ob_get_clean();

require_once 'views/layout/default.php';
