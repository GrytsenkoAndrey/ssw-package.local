# Changelog

All notable changes to `ssw-package.local` will be documented in this file.

##  Add JWT signature checking service - 2024-02-16

Add JWT signature checking service

A new service, CheckJWTSignatureService, has been added, and the functionality of handling JWT token signature checking has been moved from CheckJWTSignatureMiddleware to this new service. This encapsulates the signature checking logic and reduces the complexity of the middleware.

**Full Changelog**: https://github.com/GrytsenkoAndrey/ssw-package.local/compare/v1.0.0...v1.1.0
