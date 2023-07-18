// creates navigation bar style element and populates it with relevant CSS in dbicw.css
const navbarTemplate = document.createElement('template');
navbarTemplate.innerHTML = `

<link rel = 'stylesheet' type = 'text/css' href = '../css/dbicw.css'>

<div class="navbar">
    <img src="../images/logo.png" class="logo">
    <nav>
        <ul>
            <li><a href="../pages/index.html">Home</a></li>
            <li><a href="../pages/search_home.html">Search</a></li>
            <li><a href="../pages/add_home.html">Add</a></li>
            <li><a href="../pages/delete_home.html">Delete</a></li>
            <li><a href="../pages/edit_home.html">Edit</a></li>
        </ul>
    </nav>
</div>
`

// creates class definition
class Navbar extends HTMLElement {
    // element's constructor - defines all the funcitonality of the element
    constructor() {
        // calls super in constructor
        super();
    }

    // element functionality 
    connectedCallback() {
        // create a shadow root and attaches elements to it
        const shadowRoot = this.attachShadow({ mode: 'open' });
        shadowRoot.appendChild(navbarTemplate.content);
    }
}

// defines the custom component name to be used as: <navbar-component></navbar-component>
customElements.define('navbar-component', Navbar);




