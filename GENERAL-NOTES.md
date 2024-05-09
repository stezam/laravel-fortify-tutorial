# Laravel Fority Tutorial
# Digital Penguin
- Date 09-05-2024

---



[To integrate Bootstrap to the project please click link](https://stackoverflow.com/questions/74422287/how-to-install-bootstrap-5-on-laravel-9-with-vite)

1. Install Bootstrap 5 and dependencies To install Bootstrap from the command terminal execute the following instructions

npm i bootstrap sass @popperjs/core --save-dev

2. Configure Vite and dependencies Rename the file: resources/css/app.css to: resources/css/app.scss Open the vite.config.js file found in the root of the project and change the reference resources/css/app.css to resources/css/app.scss



```
vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
```
```
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```



In the resources/css/app.scss file import Bootstrap by adding the following line of code

```
@import 'bootstrap/scss/bootstrap';
```


In the file resources/js/bootstrap.js add the following lines

```
import * as Popper from '@popperjs/core'\
window.Popper = Popper\
import 'bootstrap'
```

3. Change .blade for Hot reloading

```
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>
```

4. Test Run dev server with command:

``
npm run dev
``




