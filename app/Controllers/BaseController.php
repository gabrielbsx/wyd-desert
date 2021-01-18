<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Models\Configuration;
use App\Models\Ranking;
use App\Models\Rankcity;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['recaptcha', 'email'];

	public $ingame = 'C:/WYD Primordial/';
	public $dbsrv = 'DBSrv/run/';
	public $tmsrv = 'TMSrv/run/';
	public $common = 'Common/';
	public $accbase = 'C:/WYD Primordial/DBSrv/base';

	public $data = [];
	public $rettype = 'web';

	public function __construct()
	{
		$config = new Configuration();
		$recaptcha = $config->select()->first();
		$site = $recaptcha['recaptcha_site'] ?? false;
		$secret = $recaptcha['recaptcha_secret'] ?? null;
		$this->data['recaptcha'] = $site;
		$this->data['recaptcha_secret'] = $secret;
		$ranking = new Ranking();
		$rankcity = new Rankcity();
		$this->data['ranking'] = $ranking->orderBy('evolution DESC, level DESC')->get(5, 0)->getResult('array');
		$this->data['rankcity'] = $rankcity->get()->getResult('array');
	}

	public function initial($account)
	{
		$init = substr($account, 0, 1);
		if (preg_match('/^[a-zA-Z]$/', $init)) {
			return $init;
		} else {
			return 'etc';
		}
	}

	public function vps($type, $request)
	{
	    $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => (new Configuration())->select(['vps_rest_address'])->first()['vps_rest_address'] . $type,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Valland-Token: ' . (new Configuration())->select(['vps_token'])->first()['vps_token'],
            ],
            CURLOPT_POSTFIELDS => json_encode($request),
		]);
		$ret = json_decode(curl_exec($ch));
        curl_close($ch);
        return $ret;
	}

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

}
