<?php
/**
 * Description: For views rendering.
 * Created by Krinnerion.
 * Date: 07.08.2015.
 */

namespace App\Service;

/**
 * @property array |null items
 * @property object|null item
 * @property array|null comments
 * @property array|null users
 * @property array article
 * @property string title
 * @property string error
 */
class View {

    protected $params = [];

    public function __construct($params = [])
    {
        $this->params = $params;
    }

    public function fill($params)
    {
        foreach($params as $key => $value)
        {
            $this->params[$key] = $value;
        }
    }

    //
    // Magic methods.
    //
    public function __set($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->params[$key]);
    }

    public function __get($key)
    {
        return $this->params[$key];
    }

    /**
     * @param $contentPageName
     */
    public function displayPage($contentPageName)
    {
        $arr = $this->generateContent($contentPageName);
        extract($arr);

        ob_start();
        include __DIR__ . "/../View/template.php";
        $page = ob_get_contents();
        ob_end_clean();

        echo $page;
    }

    /**
     * @param $templateName
     * @return string (content)
     */
    protected function generateContent($templateName)
    {
        // $this->params['items'] --> $items (array of objects);
        foreach ($this->params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/../View/" . $templateName . ".php";
        $content = ob_get_contents();
        ob_end_clean();

        return ['title' => $this->title, 'content' => $content];
    }
}