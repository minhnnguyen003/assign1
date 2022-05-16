<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Enhancement for Assignment Part 1, COS10026">
  <meta name="keywords" content="Enhancement">
  <meta name="author" content="Minh Nhat Nguyen">
  <title>Enhancement</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="enhancement">
  <div class="background-image"></div>
  <?php
    require('./navbar.inc');
  ?>

  <main class="container">

    <article class="main-article">
      <h1 class="article-title">Enhancement</h1>
      <h4 id="subtitle">Please click on the code to see full code that is store in Github<sup>&#174;</sup></h4>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">CSS Flex</summary>
          We use flex in our pages in the following section:
          <ol class="bigger-list">
            <li>
              <h4>Navigation bar</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <a target="_blank" class="code-link"
                      href="https://github.com/minhnnguyen003/assign1/blob/316f6eefe1b40da0b456db6a2a6f138503fa3a26/styles/navbar.css#L14-L22">
                      <code>
                                          .nav-bar
                                              {
                                                  display: flex;
                                                  ...}
                                          </code>
                    </a>
                    <!-- <p class="description"><strong>Description: </strong> We use Flex for the navigation bar to make it
                      easier to maintain and to make code clearer</p> -->
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    Firstly, I use <code>display: flex</code> to define the nav tag as a flex element. After that, to
                    set all the icon in the navigation bar to center, i just <code>Justify-content: center</code> to
                    align it center horizontally and <code>align-items: center</code> to align it center vertically
                  </details>
                </li>
              </ul>
            </li>
            <li>
              <h4>Implement to arrange items as well as space distribution between items in quiz page</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <a target="_blank" class="code-link"
                      href="https://github.com/minhnnguyen003/assign1/blob/316f6eefe1b40da0b456db6a2a6f138503fa3a26/styles/navbar.css#L14-L22">
                      <code>
                                          .nav-bar
                                              {
                                                  display: flex;}
                                          </code>
                    </a>

                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    Implement to arrange items as well as space distribution between items in quiz page. The flex box
                    was displayed in line 8 23 81 142 210. To use flex, I also add Justify-content. This property will
                    specifically align the flex box items that used the available spaces inside flex box to align items.
                    Here, I’ve used <code>“space-between”</code> and <code>“center”</code> as the value. One will add
                    space between the item inside flex box and one will aligns the items center
                  </details>
                  <p class="description"><strong>Source:</strong> <a class="link" target="_blank"
                      href="https://www.youtube.com/watch?v=1Rs2ND1ryYc&t=14601s">https://www.youtube.com/watch...</a>
                  </p>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">CSS Grid</summary>
          We use grid in our Enhancement Page in the following section:
          <ol>
            <li>
              <h4>Enhancement page body</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <a target="_blank" class="code-link"
                      href="https://github.com/minhnnguyen003/assign1/blob/316f6eefe1b40da0b456db6a2a6f138503fa3a26/styles/enhancement.css#L8-L28">
                      <code>
                                          .container
                                              {
                                                  display: grid;
                                                  grid-template...
                                              }
                                          </code>
                    </a>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    I use Grid to divide the website into parts, with <code>"display:grid"</code> to define the big main
                    tag as a container. The <code>grid-template-columns</code> is used to define the columns and rows
                    for the grid. <code>"grid-column-start"</code> and <code>"grid-row-start"</code> is used to set the
                    start column and of the block and same for <code>"grid-column-end"</code> and
                    <code>"grid-row-end"</code>. I found grid really helpful for me since it helps me to divide the page
                    parts easier.
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">CSS @Keyframe and Animation</summary>
          We use Keyframe to define animation in our pages in enhancement and quiz pages, and animation property to make
          basic animation for enhancement page while loading:
          <ol>
            <li>
              <h4>Enhancement</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <ul class="no-list-icon">
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/6309693915cd504623ab81192a74a731eb3fe36c/styles/enhancement.css#L73-L80">
                          <code>
                        @keyframes slidefromright { 0%...
                                          </code>
                        </a>
                      </li>
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/6309693915cd504623ab81192a74a731eb3fe36c/styles/enhancement.css#L52-L54">
                          <code>
                            .container article > * {
                              animation: slidefromright 2s ease-in-out;
                          }
                          </code>
                        </a>
                      </li>
                    </ul>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    When the page is loaded, the elements will first be stay in Width that equal to 400% of the page
                    width, then it will move to the original place. We combine this with
                    <code>animation: slidefromright 2s ease-in-out;</code>
                    <figure class="enhancement-figure">
                      <img src="./images/keyframe.gif" alt="example of how the ::after pseudo-element works">
                      <figcaption>How @keyframe and animation works in my webpage</figcaption>
                    </figure>
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">CSS Pseudo-element and Pseudo-Class</summary>
          We use pseudo-element to make a small change on enhancement page title and add some effect so that user can
          interact with it:
          <ol>
            <li>
              <h4>::before</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <ul class="no-list-icon">
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/6309693915cd504623ab81192a74a731eb3fe36c/styles/enhancement.css#L56-L70">
                          <code>
                            .container article h1::before {content: "";...}
                          </code>
                        </a>
                      </li>
                    </ul>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    Firstly, I use the <code>::before</code> to make an element that display before the title, then I
                    use some basic styling with <code>height</code>, <code>width</code> and <code>margin</code> properties to
                    align its position, <code>background-color</code> to set it background-color. Then we use
                    <code>.container article h1:hover::before {...</code> so that when user hover on the title with h1
                    tag, the width will become 265px, and I also add some CSS transition to make it happen smoothly.
                    <figure class="enhancement-figure">
                      <img src="./images/before.gif" alt="example of how the ::after pseudo-element works">
                      <figcaption>How the ::before pseudo-element works</figcaption>
                    </figure>
                  </details>
                </li>
              </ul>
            </li>
            <li>
              <h4>::after</h4>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <ul class="no-list-icon">
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/6309693915cd504623ab81192a74a731eb3fe36c/styles/enhancement.css#L103-L112">
                          <code>
                            .code-link::after {
                              content: "Click on the code to go to full file";
                              margin-left: 10px;
                              color: #61c121;
                              display: none;
                            }
                          </code>
                        </a>
                      </li>
                    </ul>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    The same thing happens to <code>::after</code>, and if we click on the Implement code block, it will
                    open the page to the source code in github with the selected code highlighted. Lets look at the gif
                    below to see more about what really happens when we hover
                    <figure class="enhancement-figure">
                      <img src="./images/after.gif" alt="example of how the ::after pseudo-element works">
                      <figcaption>Example of how the ::after pseudo-element works</figcaption>
                    </figure>
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">CSS transition</summary>
          We use transition in the pseudo-element to make some smooth effect on enhancement to make the user feeling
          like they can interact
          with page:
          <ol>
            <li>In our enhancement page
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <ul class="no-list-icon">
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/04a76a4a659e875d386335f141e4cca233080b1e/styles/enhancement.css#L56-L64">
                          <code>
                            .container article h1::before {transition: ease-in-out .6s;}
                          </code>
                        </a>
                      </li>
                    </ul>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    As  I have mention on the pseudo-element, if we hover on the enhancement word, it will be highlight. And I use transition so it looks smoothly. <code>transition: ease-in-out .6s;</code> meaning that the transition will happen in 0.6 second and <code>ease-in-out</code> meaning that the transition effect will become slower at the start and the end.
                    <figure class="enhancement-figure">
                      <img src="./images/before.gif" alt="example of how the transition works">
                      <figcaption>CSS transition properties makes the website looks better</figcaption>
                    </figure>
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">CSS custom scrollbar</summary>
          To make the interface look more friendly, I have change the default scrollbar that has been used for years with some new stuff
          <ol>
            <li>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <ul class="no-list-icon">
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/316f6eefe1b40da0b456db6a2a6f138503fa3a26/styles/style.css#L35-56">
                          <code>
                            ::-webkit-scrollbar {
                              width: 10px;
                              height: 10px;
                          }...
                          </code>
                        </a>
                      </li>
                    </ul>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    I have use the <code>::-webkit-scrollbar</code> Pseudo-element to change the background of the scrollbar, <code>::-webkit-scrollbar-track</code> to change the space under the progress bar, and <code>::-webkit-scrollbar-thumb</code> to style the drag scrolling bar. 
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
      <article class="sub-article">
        <details open>
          <summary class="head-summary">No Javascript Responsive Navigation bar</summary>
          In the modern world, every website or application has to be Responsive and has to be prior to use normally on mobile devices, I had made a responsive Navigation bar by myself, first using some Javascript, but since assignment does not accept Javascript, I have to change. Thanksfully that I found that we can tick the label of the check box, so I came up with an idea
          <ol>
            <li>
              <ul class="no-list-icon">
                <li>
                  <details open>
                    <summary><strong>Implemented code</strong></summary>
                    <ul class="no-list-icon">
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/316f6eefe1b40da0b456db6a2a6f138503fa3a26/styles/navbar.css#L81-L89">
                          <code>
                            #menu-btn {
                              display: none;
                            }
                            #menu-btn:checked ~ ul {
                                display: block !important;
                                width: 90%;
                            }
                          </code>
                        </a>
                      </li>
                      <li>
                        <a target="_blank" class="code-link"
                          href="https://github.com/minhnnguyen003/assign1/blob/316f6eefe1b40da0b456db6a2a6f138503fa3a26/index.html#L20-L21">
                          <code>
                            input type="checkbox" name="menu-btn" id="menu-btn"
                            i class="fa-solid fa-bars"
                          </code>
                        </a>
                      </li>
                    </ul>
                  </details>
                  <details open class="description">
                    <summary><strong>Description: </strong></summary>
                    Here I use the input tag with checkbox, and a label for that input, which is the 3 bars icon. Then I use CSS rule to not display the checkbox through <code>display: none;</code>. Then I combine with the <code>@media screen and (max-width: 1024px)</code> to make sure that when the screen size of the device is smaller than 1024px, every links in the navbar will be hidden using <code>display: none;</code>, the three bars icon will be there using <code>display: block</code>. Then I use the siblings selector <code>#menu-btn:checked ~ ul</code> so that when we touch the icon, the sibling ul tag, which is navbar list will display.
                  </details>
                </li>
              </ul>
            </li>
          </ol>
        </details>
      </article>
    </article>
  </main>
  <?php
    require('./footer.inc')
  ?>
</body>


</html>