# Дополнительное задание simtech
# Техническое задание дополнения: 
Проверка возраста

Для того, чтобы ограничить доступ к содержимому сайта лиц не достигших 18 лет необходимо реализовать всплывающее окно на черном фоне, на котором будет предлагаться посетителю ввести дату своего рождения и подтвердить возраст. Всплывающее окно должно быть на любой странице сайта.

В случае если посетитель ввел дату рождения и его возраст оказался больше 18 лет, всплывающее окно удаляется, записывается кука о том, что возраст проверен. Далее на протяжении всей сессии всплывающее окно проверки возраста не должно появляться.

Если пользователю меньше 18 лет, записывается кука о том, что возраст не подтвержден. Содержимое всплывающего окна должно изменится и содержать информацию о том, что доступ на сайт закрыт так как возраст не подтвержден. При перезагрузке страницы окно с информацией о неподтвержденном возрасте должно также всплывать блокируя тем самым доступ к контенту на любой странице.

Проверка введенных данных должна производится на стороне PHP.

# Окружение: 
  - cscart_v4.15.2_ru
  - Ubuntu0.20.04.2
  - PHP 7.4.3
  - Apache/2.4.41 (Ubuntu)
  - MySQL Ver 8.0.31-0ubuntu0.20.04.2 for Linux on x86_64 ((Ubuntu))
  
# Установка: 
  - Выполнить клонирование репозитория со всеми ветками.
  - Добавить файл config.local.php
  - Добавить папку var/cache
  
# Настройки приложения:
  - В настройках модуля можно выбрать минимальный возраст для посетителей сайта. Вводить нужно число. В сучае ввода некорректных данных - минимальный возраст устанавливается 18 лет. Значение настройки по умолчанию - 18 лет.

# Приложение: 
  - При заходе на любую страницу сайта появляется предупреждение на черном фоне, блокирующее доступ к сайту. Предупреждение показывает минимальный возраст для просмотра сайта и предлагает ввести дату рождения. 
После ввода нажимаем кнопку отправки "ОТПРАВИТЬ/SUBMIT". 
  - Если возраст введенной даты рождения больше или равен возрасту ограничения, то пользователь получает доступ к сайту.
  - Если возраст введенной даты рождения меньше возраста ограничения, то содержимое окна меняется на сообщение о блокировке доступа. Оно не пропадает до следующей сессии.