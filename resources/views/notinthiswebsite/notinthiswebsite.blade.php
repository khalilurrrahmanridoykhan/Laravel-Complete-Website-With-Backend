<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        :root {
  --darkgreen: #005361;
  --white: #fff;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body,
.tabs-to-dropdown .dropdown-toggle,
.tabs-to-dropdown .dropdown-item {
  font-size: 1.3rem;
}

.tabs-to-dropdown .nav-wrapper {
  padding: 15px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.12);
}

.tabs-to-dropdown .nav-wrapper a {
  color: var(--darkgreen);
}

.tabs-to-dropdown .nav-pills .nav-link.active {
  background-color: var(--darkgreen);
}

.tabs-to-dropdown .nav-pills li:not(:last-child) {
  margin-right: 30px;
}

.tabs-to-dropdown .tab-content .container-fluid {
  max-width: 1250px;
  padding-top: 70px;
  padding-bottom: 70px;
}

.tabs-to-dropdown .dropdown-menu {
  border: none;
  box-shadow: 0px 5px 14px rgba(0, 0, 0, 0.08);
}

.tabs-to-dropdown .dropdown-item {
  padding: 14px 28px;
}

.tabs-to-dropdown .dropdown-item:active {
  color: var(--white);
}

@media (min-width: 1280px) {
  .tabs-to-dropdown .nav-wrapper {
    padding: 15px 30px;
  }
}


/* FOOTER STYLES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.page-footer {
  position: fixed;
  right: 15px;
  bottom: 20px;
  display: flex;
  align-items: center;
  font-size: 1rem;
  padding: 5px;
  background: var(--white);
}

.page-footer a {
  margin-left: 4px;
}
    </style>
</head>

<body>


    <div class="tabs-to-dropdown">
        <div class="nav-wrapper d-flex align-items-center justify-content-between">
          <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-company-tab" data-toggle="pill" href="#pills-company" role="tab" aria-controls="pills-company" aria-selected="true">Company</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-product-tab" data-toggle="pill" href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="false">Product</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-news-tab" data-toggle="pill" href="#pills-news" role="tab" aria-controls="pills-news" aria-selected="false">News</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
          </ul>

          <ul class="list-group list-group-horizontal">
            <li class="list-group-item">
              <a href="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.19795 21.5H13.198V13.4901H16.8021L17.198 9.50977H13.198V7.5C13.198 6.94772 13.6457 6.5 14.198 6.5H17.198V2.5H14.198C11.4365 2.5 9.19795 4.73858 9.19795 7.5V9.50977H7.19795L6.80206 13.4901H9.19795V21.5Z" fill="currentColor" />
                </svg>
              </a>
            </li>
            <li class="list-group-item">
              <a href="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8 3C9.10457 3 10 3.89543 10 5V8H16C17.1046 8 18 8.89543 18 10C18 11.1046 17.1046 12 16 12H10V14C10 15.6569 11.3431 17 13 17H16C17.1046 17 18 17.8954 18 19C18 20.1046 17.1046 21 16 21H13C9.13401 21 6 17.866 6 14V5C6 3.89543 6.89543 3 8 3Z" fill="currentColor" />
                </svg>
              </a>
            </li>
            <li class="list-group-item">
              <a href="">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00977 5.83789C3.00977 5.28561 3.45748 4.83789 4.00977 4.83789H20C20.5523 4.83789 21 5.28561 21 5.83789V17.1621C21 18.2667 20.1046 19.1621 19 19.1621H5C3.89543 19.1621 3 18.2667 3 17.1621V6.16211C3 6.11449 3.00333 6.06765 3.00977 6.0218V5.83789ZM5 8.06165V17.1621H19V8.06199L14.1215 12.9405C12.9499 14.1121 11.0504 14.1121 9.87885 12.9405L5 8.06165ZM6.57232 6.80554H17.428L12.7073 11.5263C12.3168 11.9168 11.6836 11.9168 11.2931 11.5263L6.57232 6.80554Z" fill="currentColor" />
                </svg>
              </a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
            <div class="container-fluid">
              <h2 class="mb-3 font-weight-bold">Company</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce porttitor leo nec ligula viverra, quis facilisis nunc vehicula. Maecenas purus orci, efficitur in dapibus vel, rutrum in massa. Sed auctor urna sit amet eros mattis interdum. Integer imperdiet ante in quam lacinia, a laoreet risus imperdiet. Ut a blandit elit, vitae volutpat nunc. Nam posuere urna sagittis lectus eleifend viverra. Quisque mauris nunc, viverra vitae sodales non, auctor in diam. Sed dignissim pulvinar sapien sed fermentum. Praesent interdum turpis ut neque tristique ornare. Nam dictum est sed sem elementum rutrum. Nam a mollis turpis.</p>
              <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam tempus ac est convallis accumsan. Donec rhoncus condimentum leo nec cursus. Fusce a ornare nisl, id fermentum sem. Praesent pretium dui magna, in aliquam lectus tempor sed. Donec maximus lectus quis vehicula gravida. Proin odio nisi, aliquet ac ipsum quis, auctor semper leo. Curabitur vitae justo vel augue varius cursus non quis est. Nunc vulputate nunc nibh, sed tempus erat tincidunt eget. Duis a lacus at nulla porttitor tincidunt. Vestibulum euismod elementum mi ut tincidunt. Suspendisse tempus, mi et imperdiet maximus, est turpis placerat massa, at venenatis sem elit ut ex. Donec non aliquam odio. Curabitur ut leo vitae magna lobortis accumsan. Phasellus viverra eu leo non rhoncus.</p>
              <p>Pellentesque rutrum sit amet nunc sit amet faucibus. Ut id arcu tempus, varius erat et, ornare libero. In quis felis nunc. Aliquam euismod lacus a eros ornare, ut aliquam sem mattis. Cras non varius dui, quis commodo ante. Maecenas gravida est non nulla malesuada egestas. Proin tincidunt eros et lacus sodales lobortis.</p>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
            <div class="container-fluid">
              <h2 class="mb-3 font-weight-bold">Product</h2>
              <p>Sed auctor urna sit amet eros mattis interdum. Integer imperdiet ante in quam lacinia, a laoreet risus imperdiet. Ut a blandit elit, vitae volutpat nunc. Nam posuere urna sagittis lectus eleifend viverra. Quisque mauris nunc, viverra vitae sodales non, auctor in diam. Sed dignissim pulvinar sapien sed fermentum. Praesent interdum turpis ut neque tristique ornare. Nam dictum est sed sem elementum rutrum. Nam a mollis turpis.</p>
              <p>Proin odio nisi, aliquet ac ipsum quis, auctor semper leo. Curabitur vitae justo vel augue varius cursus non quis est. Nunc vulputate nunc nibh, sed tempus erat tincidunt eget. Duis a lacus at nulla porttitor tincidunt. Vestibulum euismod elementum mi ut tincidunt. Suspendisse tempus, mi et imperdiet maximus, est turpis placerat massa, at venenatis sem elit ut ex. Donec non aliquam odio. Curabitur ut leo vitae magna lobortis accumsan. Phasellus viverra eu leo non rhoncus.</p>
              <p>Pellentesque rutrum sit amet nunc sit amet faucibus. Ut id arcu tempus, varius erat et, ornare libero. In quis felis nunc. Aliquam euismod lacus a eros ornare, ut aliquam sem mattis. Cras non varius dui, quis commodo ante. Maecenas gravida est non nulla malesuada egestas.</p>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
            <div class="container-fluid">
              <h2 class="mb-3 font-weight-bold">News</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce porttitor leo nec ligula viverra, quis facilisis nunc vehicula. Maecenas purus orci, efficitur in dapibus vel, rutrum in massa. Sed auctor urna sit amet eros mattis interdum. Integer imperdiet ante in quam lacinia, a laoreet risus imperdiet.</p>
              <p>Proin maximus iaculis rhoncus. Morbi ante nibh, facilisis semper faucibus consequat, facilisis ut ante. Mauris at nisl vitae justo auctor imperdiet. Cras sodales, justo sed tincidunt venenatis, ante erat ultricies eros, at mollis eros lorem ac mi. Fusce sagittis nibh nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec mollis eros sodales convallis faucibus. Vestibulum sit amet odio lectus. Duis eu dolor vitae est venenatis viverra eu sit amet nisl. Aenean vel sagittis odio. Quisque in lacus orci. Etiam ut odio lobortis odio consectetur ornare.</p>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="container-fluid">
              <h2 class="mb-3 font-weight-bold">Contact</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce porttitor leo nec ligula viverra, quis facilisis nunc vehicula. Maecenas purus orci, efficitur in dapibus vel, rutrum in massa. Sed auctor urna sit amet eros mattis interdum. Integer imperdiet ante in quam lacinia, a laoreet risus imperdiet.</p>
              <p>Proin maximus iaculis rhoncus. Morbi ante nibh, facilisis semper faucibus consequat, facilisis ut ante. Mauris at nisl vitae justo auctor imperdiet. Cras sodales, justo sed tincidunt venenatis, ante erat ultricies eros, at mollis eros lorem ac mi. Fusce sagittis nibh nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec mollis eros sodales convallis faucibus. Vestibulum sit amet odio lectus. Duis eu dolor vitae est venenatis viverra eu sit amet nisl. Aenean vel sagittis odio. Quisque in lacus orci. Etiam ut odio lobortis odio consectetur ornare.</p>
            </div>
          </div>
        </div>
      </div>

      <footer class="page-footer">
        <span>made by </span>
        <a href="https://georgemartsoukos.com/" target="_blank">
          <img width="24" height="24" src="https://assets.codepen.io/162656/george-martsoukos-small-logo.svg" alt="George Martsoukos logo">
        </a>
      </footer>

  <!-- Tabs content -->
  <script>
    const $tabsToDropdown = $(".tabs-to-dropdown");

function generateDropdownMarkup(container) {
  const $navWrapper = container.find(".nav-wrapper");
  const $navPills = container.find(".nav-pills");
  const firstTextLink = $navPills.find("li:first-child a").text();
  const $items = $navPills.find("li");
  const markup = `
    <div class="dropdown d-md-none">
      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ${firstTextLink}
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        ${generateDropdownLinksMarkup($items)}
      </div>
    </div>
  `;
  $navWrapper.prepend(markup);
}

function generateDropdownLinksMarkup(items) {
  let markup = "";
  items.each(function () {
    const textLink = $(this).find("a").text();
    markup += `<a class="dropdown-item" href="#">${textLink}</a>`;
  });

  return markup;
}

function showDropdownHandler(e) {
  // works also
  //const $this = $(this);
  const $this = $(e.target);
  const $dropdownToggle = $this.find(".dropdown-toggle");
  const dropdownToggleText = $dropdownToggle.text().trim();
  const $dropdownMenuLinks = $this.find(".dropdown-menu a");
  const dNoneClass = "d-none";
  $dropdownMenuLinks.each(function () {
    const $this = $(this);
    if ($this.text() == dropdownToggleText) {
      $this.addClass(dNoneClass);
    } else {
      $this.removeClass(dNoneClass);
    }
  });
}

function clickHandler(e) {
  e.preventDefault();
  const $this = $(this);
  const index = $this.index();
  const text = $this.text();
  $this.closest(".dropdown").find(".dropdown-toggle").text(`${text}`);
  $this
    .closest($tabsToDropdown)
    .find(`.nav-pills li:eq(${index}) a`)
    .tab("show");
}

function shownTabsHandler(e) {
  // works also
  //const $this = $(this);
  const $this = $(e.target);
  const index = $this.parent().index();
  const $parent = $this.closest($tabsToDropdown);
  const $targetDropdownLink = $parent.find(".dropdown-menu a").eq(index);
  const targetDropdownLinkText = $targetDropdownLink.text();
  $parent.find(".dropdown-toggle").text(targetDropdownLinkText);
}

$tabsToDropdown.each(function () {
  const $this = $(this);
  const $pills = $this.find('a[data-toggle="pill"]');

  generateDropdownMarkup($this);

  const $dropdown = $this.find(".dropdown");
  const $dropdownLinks = $this.find(".dropdown-menu a");

  $dropdown.on("show.bs.dropdown", showDropdownHandler);
  $dropdownLinks.on("click", clickHandler);
  $pills.on("shown.bs.tab", shownTabsHandler);
});

  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
