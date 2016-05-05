Huvudtema för WordPress Sverige
===============================

Tema för [WordPress Sveriges](https://github.com/wpsvse) communityportal.

Denna repo är ansluten till [huvudrepon wpsv.se](https://github.com/wpsvse/wpsv.se) (submodule). För bästa arbetsflöde, gör ändringar för temat via pull requests på forks av denna repo, inte huvudrepon.

För issues använd huvudrepons [issues (ärendesystem)](https://github.com/wpsvse/wpsv.se/issues) (se också [Prefix för "Issues"](https://github.com/wpsvse/wpsv.se/wiki/Prefix-f%C3%B6r-%22Issues%22)).

## Gulp

Om du har gjort en ändring i ett stylesheet eller en javascripts fil så måste du köra ett gulp kommando för att verkställa dina ändringar.

1. Installera [nodejs](ttps://nodejs.org/en/)

2. Installera paket från `package.json`, kör `npm install` från root av temat.

3. exekvera `gulp` för att komprimera. Detta görs automatiskt och bevakar filändringarna.
