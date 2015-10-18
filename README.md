Huvudtema för WordPress Sverige
===============================

Tema för [WordPress Sveriges](https://github.com/wpsvse) communityportal.

Denna repo är ansluten till [huvudrepon wpsv.se](https://github.com/wpsvse/wpsv.se) (submodule). För bästa arbetsflöde, gör ändringar för temat via pull requests på forks av denna repo, inte huvudrepon.

För issues använd huvudrepons [issues (ärendesystem)](https://github.com/wpsvse/wpsv.se/issues) (se också [Prefix för "Issues"](https://github.com/wpsvse/wpsv.se/wiki/Prefix-f%C3%B6r-%22Issues%22)).


## Gulp

WordPress Sverige använder Gulp för att automatisera optimering av kod. Följ dessa enkla steg för att sätta upp Gulp JS lokalt.

1. Ladda ner Nodejs lokalt till din dator. Du kan hämta det [här](https://nodejs.org/en/)

2. Ladda ner Gulp lokalt till din dator. `npm install --global gulp`

3. Ställ dig i temats root (wpsv) och kör kommandot `npm install` för att hämta alla paket vi använder från npm

4. Kör kommandot `gulp` så övervakar den filändringar och gör automatiserade uppgifter åt dig.
