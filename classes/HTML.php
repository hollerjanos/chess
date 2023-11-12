<?php

namespace Content\Includes;

class HTML
{
    private int $tabIndent;

    private int $randomNumber;

    public function __construct(int $tabIndent)
    {
        $this->tabIndent = $tabIndent;

        $this->randomNumber = rand(10000, 99999);
    }

    private function buildPath(string $path): string
    {
        $scheme = $_SERVER["REQUEST_SCHEME"] ?? "http";
        $domain = $_SERVER["SERVER_NAME"] ?? "localhost";

        return sprintf(
            "%s://%s/%s?v=%s",
            $scheme, $domain, $path, $this->randomNumber
        );
    }

    private function buildClass(array $classes = []): string
    {
        return implode(" ", $classes);
    }

    private function buildData(array $data = []): string
    {
        $return = [];

        foreach ($data as $key => $item)
        {
            $return[] = "data-$key=\"$item\"";
        }

        return implode(" ", $return);
    }

    private function tab(): void
    {
        for ($index = 0; $index < $this->tabIndent; $index++)
        {
            echo "    ";
        }
    }

    public function comment(string $comment): void
    {
        $this->tab();
        echo "<!-- $comment -->\n";
    }

    public function doctype(): void
    {
        $this->tab();
        echo "<!DOCTYPE html>\n";
    }

    public function htmlStart(array $config = []): void
    {
        $lang = $config["lang"] ?? "en";

        $this->tab();
        echo "<html";
        echo " lang=\"$lang\"";
        echo ">\n";

        $this->tabIndent++;
    }

    public function htmlEnd(): void
    {
        $this->tabIndent--;

        $this->tab();
        echo "</html>";
    }

    public function headStart(): void
    {
        $this->tab();
        echo "<head>\n";

        $this->tabIndent++;
    }

    public function headEnd(): void
    {
        $this->tabIndent--;

        $this->tab();
        echo "</head>\n";
    }

    public function title(string $innerText): void
    {
        $this->tab();
        echo "<title>$innerText</title>\n";
    }

    public function bodyStart(): void
    {
        $this->tab();
        echo "<body>\n";

        $this->tabIndent++;
    }

    public function bodyEnd(): void
    {
        $this->tabIndent--;

        $this->tab();
        echo "</body>\n";
    }

    public function link(array $config = []): void
    {
        $rel = $config["rel"] ?? "";
        $type = $config["type"] ?? "";
        $href = $config["href"] ?? "";

        $this->tab();
        echo "<link";
        if (!empty($rel)) echo " rel=\"$rel\"";
        if (!empty($type)) echo " type=\"$type\"";
        if (!empty($href)) echo " href=\"{$this->buildPath($href)}\"";
        echo "/>\n";
    }

    public function script(array $config = []): void
    {
        $src = $config["src"] ?? "";
        $type = $config["type"] ?? "";

        $this->tab();
        echo "<script";
        if (!empty($src)) echo " src=\"{$this->buildPath($src)}\"";
        if (!empty($type)) echo " type=\"$type\"";
        echo " defer></script>\n";
    }

    public function tableStart(array $config = []): void
    {
        $class = $config["class"] ?? "";

        $this->tab();
        echo "<table";
        if (!empty($class)) echo " class=\"{$this->buildClass($class)}\"";
        echo ">\n";

        $this->tabIndent++;
    }

    public function tableEnd(): void
    {
        $this->tabIndent--;

        $this->tab();
        echo "</table>\n";
    }

    public function trStart(): void
    {
        $this->tab();
        echo "<tr";
        echo ">\n";

        $this->tabIndent++;
    }

    public function trEnd(): void
    {
        $this->tabIndent--;

        $this->tab();
        echo "</tr>\n";
    }

    public function td(array $config = []): void
    {
        $id = $config["id"] ?? "";
        $class = $config["class"] ?? [];
        $innerText = $config["innerText"] ?? "";
        $data = $config["data"] ?? [];

        $this->tab();
        echo "<td";
        if (!empty($id)) echo " id=\"$id\"";
        if (!empty($class)) echo " class=\"{$this->buildClass($class)}\"";
        if (!empty($data)) echo " {$this->buildData($data)}";
        echo ">";
        if (!empty($innerText)) echo $innerText;
        echo "</td>\n";
    }
}
