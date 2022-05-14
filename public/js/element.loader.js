window.onload = function ()
{
    const header = document.getElementById('header');

    header.innerHTML = "<header>\n" +
        "    <nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">\n" +
        "        <div class=\"container-fluid\">\n" +
        "            <image src=\"https://i.imgur.com/7Y7kaqF.png\" width=\"auto\" height=\"35\"></image><a class=\"navbar-brand\" href=\"index.php\">CSR</a>\n" +
        "            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarColor01\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n" +
        "                <span class=\"navbar-toggler-icon\"></span>\n" +
        "            </button>\n" +
        "\n" +
        "            <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">\n" +
        "                <ul class=\"navbar-nav me-auto\">\n" +
        "                    <li class=\"nav-item\">\n" +
        "                        <a class=\"nav-link active\" href=\"index.php\">Home\n" +
        "                            <span class=\"visually-hidden\">(current)</span>\n" +
        "                        </a>\n" +
        "                    </li>\n" +
        "                    <li class=\"nav-item\">\n" +
        "                        <a class=\"nav-link\" href=\"about.php\">About</a>\n" +
        "                    </li>\n" +
        "                </ul>\n" +
        "                        <a class=\"nav-link\" href=\"logout.php\" >Deconnexion</a>" +
        "            </div>\n" +
        "        </div>\n" +
        "    </nav>\n" +
        "</header>";
}
