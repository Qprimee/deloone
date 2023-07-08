<script setup>
import { ref } from 'vue';


const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div>
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand" href="/">
                            <span>
                            دلووان
                            </span>
                        </a>

                        <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="s-1"> </span>
                            <span class="s-2"> </span>
                            <span class="s-3"> </span>
                        </button>

                        <div class="navbar-collapse" id="navbarSupportedContent">
                                <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item active">
                                    <a class="nav-link" href="/">خانه <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="/#about"> درباره ما</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="/#service"> سرویس </a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="#contactLink">ارتباط با ما</a>
                                    </li>
                                </ul>
                                </div>
                                <div class="quote_btn-container ">
                                <a href="">
                                    <img src="images/call.png" alt="">
                                    <span>
                                    تماس : 08735162095
                                    </span>
                                </a>
                                <form class="form-inline">
                                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                                </form>
                                </div>
                        </div>
                    </nav>
                </div>

            </header>
            
            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>


</template>
