# Assets / Images

Este diretório guarda imagens do tema (ícones, texturas, padrões).

## screenshot.png (a adicionar)

O WordPress exige um `screenshot.png` na **raiz do tema** (não aqui) com
**1200×900 px**, exibido em **Aparência → Temas**. Como não é possível gerar
binários neste scaffold, adicione manualmente:

1. Abra o site com o tema ativado em uma tela de 1200×900.
2. Capture a home (`front-page.php`) com o hero visível.
3. Salve como `screenshot.png` na raiz do tema (`o-bosque-fantasma/screenshot.png`).

## Logo

O tema suporta logo customizada via **Aparência → Personalizar → Identidade do site**.
Recomenda-se um PNG/SVG com fundo transparente, ~240×80 px. Se nenhuma logo for
enviada, o tema exibe o wordmark "O Bosque Fantasma" estilizado.

## Texturas de névoa

A névoa/fog do hero é feita inteiramente com gradientes CSS (sem imagens),
então nenhuma textura externa é obrigatória. Para reforçar a atmosfera, você
pode adicionar aqui um `noise.png` sutil e referenciá-lo no `body::before`
de `style.css`.
