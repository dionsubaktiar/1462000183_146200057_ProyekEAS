<nav class="main-header navbar navbar-expand navbar-white navbar-light">
 <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                    <i class="bibi-box-arrow-right"></i>Logout</button>
            </form>
        </li>
    </ul>
  </nav>
