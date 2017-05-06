<?php
namespace KP\Lunch\Controller;

/*
 * This file is part of the KP.Lunch package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\ActionRequest;
use Neos\Flow\Security\Authentication\Controller\AbstractAuthenticationController;
use KP\Lunch\Domain\Model\Database;

/**
 *
 * @Flow\Scope("singleton")
 */
class LoginController extends AbstractAuthenticationController
{

    /**
     * @Flow\Inject
     * @var \Neos\Flow\Security\Authentication\AuthenticationManagerInterface
     */
    protected $authenticationManager;

    /**
     * @Flow\Inject
     * @var \Neos\Flow\Security\AccountRepository
     */
    protected $accountRepository;

    /**
     * @var \Neos\Flow\Security\AccountFactory
     * @Flow\Inject
     */
    protected $accountFactory;
    
    /**
     * index action, does only display the form
     */
    public function indexAction() {
        // do nothing, action only required to show form
    }

    /**
     * @return void
     */
    public function registerAction() {
        // do nothing more than display the register form
    }

    /**
     * save the registration
     * @param string $uname
     * @param string $pass
     * @param string $pass2
     */
    public function createAction($uname, $pass, $pass2) {

        if($uname == '' || strlen($uname) < 3) {
            $this->addFlashMessage('Username zu Kurz');
            $this->redirect('register', 'Login');
        } else if($pass == '' || $pass != $pass2) {
            $this->addFlashMessage('Password too short or does not match');
            $this->redirect('register', 'Login');
        } else {            
            $test = $this->accountRepository->findByAccountIdentifierAndAuthenticationProviderName($uname, 'DefaultProvider');

            if ($test !== null) {
                $this->addFlashMessage('Username bereits Vergeben!');
                $this->redirect('register', 'Login');
            } else {            
                // create a account with password an add it to the accountRepository
                $account = $this->accountFactory->createAccountWithPassword($uname, $pass);
                $this->accountRepository->add($account);

                $db = Database::getInstance();
                $conn = $db->getConnection();
                $sql = "INSERT INTO user (uname) VALUES (?)";
                $statement = $conn->prepare($sql);
                $statement->bind_param('s', $uname);
                $statement->execute();

                // add a message and redirect to the login form
                $this->addFlashMessage('Account created. Please login.');
                $this->redirect('index');
            }
        }

        // redirect to the login form
        $this->redirect('index', 'Login');
    }

	/**
	 * Will be triggered upon successful authentication
	 *
	 * @param ActionRequest $originalRequest The request that was intercepted by the security framework, NULL if there was none
	 * @return string
	 */
	protected function onAuthenticationSuccess(ActionRequest $originalRequest = NULL) {
		if ($originalRequest !== NULL) {
				$this->redirectToRequest($originalRequest);
		}
		$this->redirect('index', 'Lunch');
	}

	/**
	 * Logs all active tokens out and redirects the user to the login form
	 *
	 * @return void
	 */
	public function logoutAction() {
		parent::logoutAction();
		$this->addFlashMessage('Logout successful');
		$this->redirect('index');
	}

}
