
<header>
         <h2>
            <label for="nav-toggle">
               <span class="las la-bars"></span>
            </label> <span class="name">ViewDeep</span>
         </h2>
         <form method="POST">
         <div class="search-wrapper search-desktop">
            <span class="las la-search"></span>
            <input type="text" id="search-input" name="search-input" placeholder="serial-no, amount, name...">
            <!-- <input type="submit" value="search" class="las la-search"> -->
         </div>
         </form>
         <div class="user-wrapper">
            <span class="las la-user"></span>
            <div>
               <h4><?php echo $user_data['username'] ?></h4>
               <!-- <small>Admin</small> -->
            </div>
            <a href="./functions/logout.php"><span class="las la-power-off"
                  style="color: red; border-color: red; margin-left: .5rem;"></span></a>
         </div>
      </header>
