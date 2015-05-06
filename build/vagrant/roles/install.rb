name "install"
description "Install complete basic server"
run_list(
  "recipe[wow-php-sdk::apt]",
  "recipe[wow-php-sdk::apache]",
  "recipe[wow-php-sdk::php]",
  "recipe[wow-php-sdk::composer]",
  "recipe[wow-php-sdk::vim]",
)
