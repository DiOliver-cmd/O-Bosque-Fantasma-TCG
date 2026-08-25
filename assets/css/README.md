# Assets / CSS

O stylesheet principal do tema **O Bosque Fantasma** fica na raiz do tema:

```
style.css
```

Ele é a **única fonte de verdade** para o design system do tema — variáveis CSS
(paleta, tipografia, espaçamento, raios, sombras), resets, componentes
(botões, cards, badges, formulários), overrides do WooCommerce e breakpoints
responsivos.

Este diretório (`assets/css/`) está vazio por design. Se você quiser adicionar
folhas extras (ex.: um tema claro alternativo, estilos de impressão), enfileire-as
em `functions.php` via `wp_enqueue_style()` com `obf-style` como dependência,
para herdar as variáveis CSS.

## Como customizar a paleta

Todas as cores vivem como custom properties no `:root` de `style.css`. Basta
editar os valores abaixo para mudar o tema inteiro:

```css
:root {
    --celebi-mint:     #43C6A1;
    --psychic-purple:  #7E308A;
    --shadow-black:    #212121;
    --gastly-grey:     #777777;
    --celebi-green:    #80E0A8;
    --shiny-pink:      #E6679E;
}
```
