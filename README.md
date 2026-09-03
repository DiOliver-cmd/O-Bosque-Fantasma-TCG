# O Bosque Fantasma — TCG

Tema WordPress com WooCommerce para loja de **Pokémon TCG**, inspirado em
**Celebi** (floresta / tempo / mint) e **Gengar** (sombra / fantasma / roxo).
Atmosfera escura, mística e premium — sem cartoon.

> **"Entre nas sombras da nossa floresta mágica e descubra um refúgio
> exclusivo para colecionadores e jogadores."**

---

- **Autora:** Dilaine Ferreira de Oliveira
- **GitHub:** [@DiOliver-cmd](https://github.com/DiOliver-cmd)
- **Repositório:** [O-Bosque-Fantasma-TCG](https://github.com/DiOliver-cmd/O-Bosque-Fantasma-TCG)
- **Versão:** 1.5.0
- **Requer WordPress:** 6.0+
- **Requer PHP:** 7.4+
- **WooCommerce:** 8.x
- **Idioma:** pt-BR

© 2026 Dilaine Ferreira de Oliveira. Todos os direitos reservados.

---

## Índice

1. [Visão geral](#visão-geral)
2. [Instalação](#instalação)
3. [Configurar a página inicial](#configurar-a-página-inicial)
4. [Configurar menus](#configurar-menus)
5. [Categorias de produto](#categorias-de-produto)
6. [Adicionar produtos](#adicionar-produtos)
7. [Importar inventário via CSV](#importar-inventário-via-csv)
8. [Páginas do site](#páginas-do-site)
9. [Plugins recomendados](#plugins-recomendados)
10. [Personalizar a paleta](#personalizar-a-paleta)
11. [Estrutura de arquivos](#estrutura-de-arquivos)
12. [Acessibilidade e responsividade](#acessibilidade-e-responsividade)
13. [Solução de problemas](#solução-de-problemas)
14. [Changelog](#changelog)

---

## Visão geral

**O Bosque Fantasma** é uma loja de Pokémon TCG com identidade visual mística
que mistura floresta (Celebi) e sombra (Gengar). O tema é construído para
WooCommerce 8.x e inclui:

- Landing page com hero atmosférico (névoa animada, anéis místicos)
- Grid de produtos em destaque com cards estilizados
- Categorias baseadas no inventário real (ETB, Displays, Blisters, Boxes,
  Decks, Acessórios)
- Página de produto único com galeria e detalhes
- Campos customizados por produto: Condição, Set/Coleção, Número, Idioma
- Header sticky com logo, navegação, busca e carrinho
- Footer completo com social, navegação e informações
- Design system completo via CSS custom properties
- Mobile-first, responsivo, acessível

### Paleta

| Variável CSS         | Cor       | Uso                         |
|----------------------|-----------|-----------------------------|
| `--celebi-mint`      | `#43C6A1` | Verde principal (Celebi)    |
| `--psychic-purple`   | `#7E308A` | Roxo principal (Gengar)     |
| `--shadow-black`     | `#212121` | Fundo escuro                |
| `--gastly-grey`      | `#777777` | Texto secundário            |
| `--celebi-green`     | `#80E0A8` | Verde claro (detalhes)      |
| `--shiny-pink`       | `#E6679E` | Rosa (shiny / acentos)      |

### Tipografia

- **Títulos:** Cinzel (display, serif mística)
- **Corpo:** Inter (sans-serif, legível)

---

## Instalação

### 1. Instalar o WordPress

- **Local:** [Local by Flywheel](https://localwp.com/) (mais fácil) ou
  XAMPP/WAMP.
- **Hospedagem:** a maioria das hospedeiras brasileiras (Hostinger, KingHost,
  Hostgator) oferece instalação em 1 clique.

Requisitos: PHP 7.4+ (recomendado 8.x), MySQL 5.7+ ou MariaDB 10.3+, HTTPS.

### 2. Instalar o WooCommerce

1. No admin: **Plugins → Adicionar novo**.
2. Busque por **WooCommerce**.
3. **Instalar agora** → **Ativar**.
4. Siga o assistente (país: Brasil, moeda: BRL).

### 3. Ativar o tema

1. Compacte a pasta do tema em `.zip`.
2. **Aparência → Temas → Adicionar novo → Enviar tema**.
3. Ative **O Bosque Fantasma**.
4. (Opcional) **Aparência → Personalizar → Identidade do site**:
   - Título: "O Bosque Fantasma".
   - Envie o logo (PNG/SVG, ~240×80 px). Se não enviar, o tema usa o logo
     padrão em `assets/images/logo.jfif`.

---

## Configurar a página inicial

O tema usa `front-page.php` como landing page. Para ativá-la:

1. Crie uma página **Início** (conteúdo vazio).
2. **Configurações → Leitura** → "Uma página estática" → **Início**.
3. A landing aparece com: hero, coleção em destaque, categorias, sobre o
   bosque e newsletter.

> A seção "Coleção em destaque" mostra produtos marcados como **Destaque**.
> Se não houver, exibe os mais recentes.

---

## Configurar menus

1. **Aparência → Menus**.
2. Crie o menu **Principal** com: Início, Loja, ETB, Displays, Sobre, Contato.
3. Atribua nos locais:
   - **Menu Principal** → `primary`
   - **Menu do Rodapé** → `footer`
   - **Menu Social** → `social` (Instagram, YouTube, Discord).

---

## Categorias de produto

Crie em **Produtos → Categorias** com os slugs abaixo para os cards da home
linkarem corretamente:

| Nome        | Slug                  |
|-------------|-----------------------|
| ETB         | `etb`                 |
| Displays    | `display-de-booster`  |
| Blisters    | `blister`             |
| Boxes       | `box`                 |
| Decks       | `deck`                |
| Acessórios  | `acessorio`           |

---

## Adicionar produtos

1. **Produtos → Adicionar novo**.
2. Preencha nome, descrição e preço.
3. Envie a imagem do produto (800×1120 px, proporção 3:4).
4. Na meta box **"Dados da Carta Pokémon TCG"**, preencha:

   | Campo        | Tipo    | Valores                                              |
   |--------------|---------|------------------------------------------------------|
   | Condição     | Select  | Mint, Near Mint, Lightly Played, Played, Heavily Played |
   | Set/Coleção  | Texto   | Ex: "Escuridão Absoluta (ME05)"                      |
   | Número       | Texto   | Ex: "045/091"                                        |
   | Idioma       | Select  | Português, Inglês, Japonês                           |

5. Defina preço, estoque em **Dados do produto**.
6. Marque **Destaque** (estrela) para aparecer na home.
7. **Publicar**.

### Onde os campos aparecem

- **Card de produto:** linha "Coleção · Número" sob o nome.
- **Página do produto:** bloco "Dados da carta" acima do botão de compra.

---

## Importar inventário via CSV

O arquivo `_private/importacao-woocommerce.csv` contém os produtos do
inventário prontos para importação:

1. **WooCommerce → Produtos → Importar**.
2. Envie o arquivo CSV.
3. Mapeie as colunas (o arquivo já segue o padrão WooCommerce).
4. Execute a importação.

> O CSV inclui: SKU, nome, descrição, preço regular, estoque, categorias e
> URL das imagens. Produtos sem estoque são importados como rascunho.

---

## Páginas do site

O tema inclui **custom page templates** prontos para uso. Crie uma página em
**Páginas → Adicionar nova** e selecione o template em **Atributos de página**:

| Página                | Template              | Descrição                                    |
|-----------------------|-----------------------|----------------------------------------------|
| Sobre o Bosque        | `Sobre o Bosque`      | História, pilares, categorias, autenticidade |
| Políticas de Envio    | `Políticas de Envio`  | Prazos, frete, rastreamento, embalagem       |
| Trocas e Devoluções   | `Trocas e Devoluções` | Política de 7 dias, condições, reembolso     |
| Contato               | `Contato`             | Formulário, redes sociais, horário           |

> **Formulário de contato:** o template envia via `admin-post.php` com handler
> nativo registrado em `functions.php` (`obf_handle_contato`). Validação,
> nonce, `wp_mail()` para o admin e feedback visual (sucesso/erro) já
> incluídos — não precisa de plugin. A newsletter da home também usa handler
> nativo (`obf_handle_newsletter`) e salva inscritos num CPT privado
> `obf_inscrito` (menu "Newsletter" no admin).

---

## Plugins recomendados

- **WooCommerce** (obrigatório) — e-commerce.
- **Brazilian Market on WooCommerce** (`woocommerce-extra-checkout-fields-for-brazil`)
  — campos BR (CPF/CNPJ, número, bairro) no checkout. Já instalado no ambiente Docker.
- **PagBank Connect** (`pagbank-connect`) — gateway de pagamento BR (Pix 0,99%,
  cartão 3,05%, boleto). Sucessor moderno do PagSeguro. Já instalado no Docker;
  requer conta Vendedor PagBank (PF) + autorização OAuth no admin.
- **Melhor Envio** (`melhor-envio-cotacao`) — frete BR sem contrato Correios
  (Correios/Jadlog com desconto, Mini Envios). Já instalado no Docker; requer
  conta Melhor Envio + token + CEP de origem.
- **Yoast SEO** ou **Rank Math** — SEO. **Rank Math já instalado e configurado** no ambiente Docker (meta tags OG, Twitter Cards, JSON-LD schema, sitemap XML).
- **WP Rocket** ou **LiteSpeed Cache** — performance.
- **Smush** ou **ShortPixel** — otimização de imagens.

> **Newsletter e formulário de contato** já são nativos do tema (handlers
> `admin-post` em `functions.php`) — não precisam de MailPoet/Mailchimp nem
> Contact Form 7.

---

## Personalizar a paleta

Toda a paleta vive como CSS custom properties no `:root` de `style.css`:

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

Para mudar o tema inteiro, edite esses valores. Para não mexer no tema,
crie um tema filho (`o-bosque-fantasma-child/`) sobrescrevendo apenas as
variáveis.

---

## Estrutura de arquivos

```
o-bosque-fantasma/
├── style.css                      # Design system (fonte única de verdade)
├── functions.php                  # Setup, enqueue, meta boxes TCG, WC hooks
├── front-page.php                 # Landing page
├── header.php                     # Cabeçalho sticky + nav + cart + busca
├── footer.php                     # Rodapé + menus + social
├── index.php                      # Blog / fallback
├── page.php                       # Página estática
├── single.php                     # Post único
├── searchform.php                 # Form de busca compacto
├── 404.php                        # "Você se perdeu no bosque..."
├── comments.php                   # Comentários
├── README.md                      # Este arquivo
├── .gitignore
├── assets/
│   ├── css/
│   ├── images/
│   │   └── logo.jfif             # Logo do site
│   └── js/
│       └── main.js               # Sticky, menu mobile, parallax, reveal, cart
├── template-parts/
│   ├── product-card.php           # Card reutilizável de produto
│   └── section-featured.php       # Seção de destaques da home
├── woocommerce/
│   ├── archive-product.php        # Loja (WC 8.x)
│   ├── single-product.php         # Produto único (WC 8.x)
│   └── content-product.php        # Item da lista (delega para product-card)
└── _private/                      # (gitignored — não sobe para o repo)
    ├── inventario_bosque_fantasma_completo.xlsx
    ├── importacao-woocommerce.csv
    └── RETOMADA-TRABALHO.md       # Contexto para retomar o trabalho
```

---

## Acessibilidade e responsividade

- **Mobile-first** com breakpoints em 768px e 1024px.
- HTML semântico (`header`, `main`, `nav`, `footer`, `article`).
- Contraste de texto **AA** (`#f4f4f5` sobre `#212121`).
- `skip-link` para pular ao conteúdo.
- `aria-label`, `aria-expanded`, `alt` em imagens.
- Respeita `prefers-reduced-motion`.
- Foco visível em formulários e links.

---

## Solução de problemas

**A home aparece vazia / sem produtos:**
- Verifique se há produtos publicados e marcados como **Destaque**.
- Confirme que a página "Início" está em **Configurações → Leitura**.

**Os campos TCG não aparecem:**
- Confirme que o WooCommerce está ativo.
- Salve o produto novamente.

**Os cards de categoria não linkam:**
- Crie as categorias com os slugs corretos (ver tabela acima).

**Fontes não carregam:**
- O tema usa Google Fonts (Cinzel + Inter). Confirme acesso à internet.

---

## Changelog

### v1.5.0 — 03/09/2026
- **SEO configurado:** Rank Math SEO v1.0.277.2 instalado e configurado
  - Meta tags OG, Twitter Cards, JSON-LD schema (Organization, WebSite,
    WebPage, Article, Product) injetados no frontend
  - Sitemap XML ativo em `/sitemap_index.xml` (post, page, product,
    category, product_cat)
  - Título e descrição SEO da home configurados
  - Logo importado para a Media Library (schema Organization)
  - Locale do WordPress corrigido para `pt_BR` (inLanguage: pt-BR)
- **Revisão mobile completa:**
  - Busca mobile: botão lupa (44×44px) + overlay expansível substitui o
    `display: none` que escondia a busca em mobile
  - Backdrop/scrim semi-transparente atrás do drawer do menu e da busca
    (fecha ao toque)
  - Grid de produtos: 2 colunas em todos os breakpoints mobile (antes 1
    coluna em ≤480px — largo demais)
  - Touch targets ≥ 44px em todos os elementos interativos mobile
    (menu-toggle, search-toggle, cart-link, nav links, botões de card)
  - Hero: título fluido com `clamp()` em ≤480px (não estoura em 320-375px)
  - Footer: 2 colunas em 768px (antes 1 col), colapsa para 1 col em ≤600px
  - Cart count badge: 20×20px + ring de contraste
  - Focus states acessíveis (`:focus-visible` com outline mint)
  - Cards de produto compactados progressivamente em 768px e 480px
- **Breakpoints novos:** 600px (footer), 480px reescrito (hero, cards, seções)
- **Timezone:** `America/Sao_Paulo` configurada no WordPress

### v1.4.0 — 28/08/2026
- Formulário de contato funcional: handler `admin-post` nativo em
  `functions.php` (`obf_handle_contato`) com nonce, validação, `wp_mail()`
  para o admin e feedback visual (sucesso/erro) na página de contato
- Newsletter funcional: handler `admin-post` nativo (`obf_handle_newsletter`)
  que salva inscritos em CPT privado `obf_inscrito` (menu "Newsletter" no
  admin), envia e-mail ao admin, valida duplicados e mostra feedback na home
- Removido handler JS demo que impedia o envio real da newsletter
- CSS: blocos de feedback para contato e newsletter (cores da paleta)
- Plugins instalados no ambiente Docker (prontos para credenciais):
  - Brazilian Market on WooCommerce v4.0.2 (campos BR no checkout)
  - PagBank Connect v4.57.0 (Pix, cartão, boleto — sucessor do PagSeguro)
  - Melhor Envio v2.16.6 (frete BR sem contrato, Mini Envios + PAC)
- Documentação atualizada: seção de plugins e formulário de contato

### v1.3.0 — 26/08/2026
- Categorias dos 26 produtos corrigidas (ETB:7, Displays:2, Blisters:4,
  Boxes:5, Decks:3, Acessórios:5)
- Produtos esgotados visíveis na loja: badge "Esgotado", preço oculto
  ("Preço sob consulta"), imagem com opacidade/grayscale
- Links do rodapé corrigidos: Envios, Trocas, Autenticidade, Contato → páginas reais
- Background dark fantasy: imagem gerada por IA aplicada ao fundo do site
- Cache busting dinâmico no CSS e JS (filemtime)
- Tabelas de prazos e valores: largura total, sem scroll horizontal

### v1.2.0 — 25/08/2026
- Header redesenhado: 3 itens (Início, Sobre, Loja) com dropdown de categorias
- Dropdown "Loja": Ver tudo + ETB, Displays, Blisters, Boxes, Decks, Acessórios
- JS: toggle do dropdown (click + hover desktop + teclado)
- CSV atualizado: 26 produtos mapeados às 6 categorias corretas
- Página "Políticas de Envio" reescrita com dados reais dos Correios:
  - Tabela de prazos por região (PAC + SEDEX) com margem +2 dias úteis
  - Tabela de valores médios de frete por região
  - Mini Envios para itens leves
- Ambiente Docker local: WordPress + MySQL + WooCommerce rodando
- Scripts: start.sh, stop.sh, reset.sh
- 26 produtos importados, 8 marcados como destaque
- 4 páginas criadas com templates ativos

### v1.1.0 — 25/08/2026
- Página "Sobre o Bosque": história, pilares (autenticidade, curadoria,
  transparência, comunidade), categorias, processo de verificação, CTA
- Página de produto único polida: breadcrumbs místicos, layout duas colunas,
  título com gradiente, trust badges (autêntico, envio, verificado, suporte),
  tabs estilizadas, relacionados com heading gradiente
- Página "Políticas de Envio": prazos por região, frete, rastreamento, embalagem
- Página "Trocas e Devoluções": política 7 dias, condições, procedimento 3 passos
- Página "Contato": métodos de contato (Instagram, e-mail, Discord), formulário
  estilizado, horário de atendimento
- CSS: 3 novos blocos organizados (Sobre, Single product, Institutional)

### v1.0.0 — 25/08/2026
- Tema WordPress + WooCommerce 8.x criado
- Design system completo com paleta Celebi/Gengar
- Landing page com hero, produtos em destaque, categorias, sobre, newsletter
- Campos customizados de produto: Condição, Set, Número, Idioma
- Templates WooCommerce: archive, single product, content-product
- Header sticky com logo, busca, carrinho
- Footer com social, navegação, ajuda
- CSV de importação com 26 produtos do inventário
- Logo integrado
- Screenshots de preview gerados

---

**Feito com sombra e floresta.**
© 2026 Dilaine Ferreira de Oliveira. Todos os direitos reservados.
