# nl_cooldate
  - подменяет шаблон даты и вместо '1-1-2017' выводит '1 января 2017'
  
# nl_include_php
  - добавляет вызов произвольного php в начале и конце шаблона
  
# nl_last_tree 
  Расширение создает отдельную страницу для вывода последних тем в виде "дерева".

  - в подменю форума добавлена отдельная ссылка на страницу - "Дерево сообщений"
  - на странице "Дерево сообщений" выводятся темы из всех доступных пользователю форумов
  - темы отсортированы по последнему посту
  - для каждой темы выводится: "форум" -> "название темы" -> "автор темы" -> "дата создания"
  - если в теме есть ответы, то выводятся последние несколько авторов
  - непрочитанные сообщения выделяются

  обсуждение - https://punbb.info/t-1115.html
    
# nl_realip
  - подменяет функцию определения IP посетителя, пытаясь определить реальный IP (из-за прокси)
  
# nl_gravatar
  Расширение дополняет функциональность аватар, добавляя поддержку граватар (Глобально распознаваемый аватар) https://ru.gravatar.com/

  - используется API сервиса для получения ссылки на картинку https://ru.gravatar.com/site/implement/images/
  - перехватывается hook показа аватара, и как следствие граватары работают для всех пользователей и не хранятся на сервере
  - поддерживаются все режимы сервиса для картинок по умолчанию и ограничения по рейтингу
  - добавлен режим defaultimage - если у пользователя нет граватара, то показывается картинка по умолчанию. Это позволяет использовать данное расширение как замену default image
  - если установлено расширение gender (в таблице users есть поле gender), то можно указать различные картинки по умолчанию для мальчиков и девочек
  - пользователь может включать или отключать граватар
  - если на форуме разрешены посты от гостей, то можно включать/отключать граватары для гостевых постов

  обсуждение - https://punbb.info/t-1116.html
  
# nl_userlist_avatar
  Расширение добавляет в список пользователей аватары
  (написано по мотивам аналогичного расширения от kierownik http://punbb.informer.com/forums/topic/18622.html)
  
  - можно указать размеры показываемого аватара
  - совместимо с nl_gravatar и другими расширениями изменяющими стандартный аватар
  - пользователь может отключить показ аватара в списке
  
  обсуждение - https://punbb.info/t-1118.html
  # nl_disablefields
  Расширение позволяет отключить стандартные (устаревшие) поля в профиле

  обсуждение - https://punbb.info/t-1119.html
