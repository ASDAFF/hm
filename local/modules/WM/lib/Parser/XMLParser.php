<?php

namespace WM\Parser;

/**
 * Class XMLParser
 * @package WM\Parser
 */
/**
 * Class XMLParser
 * @package WM\Parser
 */
class XMLParser
{
    /**
     * @var null
     */
    protected $file = null;
    /**
     * @var null
     */
    protected $doc = null;
    /**
     * @var bool
     */
    protected $loaded = false;
    /**
     * @var null
     */
    protected $path = null;

    /**
     *
     */
    const PATH_DIR = '/upload/parser/';

    /**
     * XMLParser constructor.
     * @param null $file
     */
    public function __construct($file = null, $fileName = null)
    {
        isset($file) && $this->setFile($file, $fileName);
    }

    /**
     * @param $file
     */
    public function setFile($file, $fileName = null)
    {
        $this->file = $file;
        $this->path = $_SERVER['DOCUMENT_ROOT'] . static::PATH_DIR .  basename(isset($fileName) ? $fileName : $file);
    }

    /**
     * @param bool $needUpdate
     * @return bool
     * @throws \Exception
     */
    public function loadDoc($needUpdate = false)
    {
        if($needUpdate || !is_file($this->path))
            file_put_contents($this->path, file_get_contents($this->file));

        if(!is_file($this->path))
            throw new \Exception('File not found');

        $this->doc = simplexml_load_string(file_get_contents($this->path));

        return ($this->loaded = !empty($this->doc));
    }

    /**
     * @param $username
     * @param $password
     * @param bool $needUpdate
     * @throws \Exception
     */
    public function loadDocWithAuth($username, $password, $needUpdate = false)
    {

        if($needUpdate || !is_file($this->path))
        {
            $ch = curl_init($this->file);
            curl_setopt_array($ch, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_USERPWD => $username . ':' . $password,
            ));
            file_put_contents($this->path, curl_exec($ch));
            curl_close($ch);
        }

        if(!is_file($this->path))
            throw new \Exception('File not found');

        if($needUpdate || (false !== strpos($this->path, '.zip') && !is_file(str_replace('.zip', '', $this->path))))
        {
            if (false !== strpos($this->path, '.zip'))
            {
                $this->unZipFile();
                $path = str_replace('.zip', '', $this->path);
            }
            else
                $path = $this->path;
            file_put_contents($path, strtr(file_get_contents($path), array('&' => '&amp;', '' => '')));
        }
        else
            $path = str_replace('.zip', '', $this->path);
        $this->doc = simplexml_load_file($path);
        return ($this->loaded = !empty($this->doc));
    }

    /**
     *
     */
    public function unZipFile()
    {
        $zip = new \ZipArchive();
        $zip->open($this->path);
        $zip->extractTo($_SERVER['DOCUMENT_ROOT'] . static::PATH_DIR);
    }

    /**
     * @return string
     */
    public function getXmlPrefix()
    {
        static $prefix = null;
        if(!isset($prefix))
            $prefix = substr(preg_replace('~_{2,}~', '_', strtoupper(strtr(get_class($this), array('WM' => '', 'Parser' => '', '\\' => '_'))) . '_'), 1);
        return $prefix;
    }

    public function loadProducts(IblockElement $element, $step, $stepSize = 100, $redirectUri = '/parser.php')
    {
        $element->loadProducts($step, $stepSize, $redirectUri);
    }
}