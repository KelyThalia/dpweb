# TODO: Fix Edit Proveedor Functionality

## Completed Tasks
- [x] Analyze the issue: The edit-proveedor.php file was calling edit_user() instead of edit_proveedor(), preventing form population.
- [x] Fix script call: Changed `edit_user();` to `edit_proveedor();` in edit-proveedor.php.
- [x] Correct HTML input types: Fixed "tex" to "text" for departamento, provincia, and direccion fields.
- [x] Verify backend: Confirmed UsuarioController.php and UsuarioModel.php handle updates correctly for providers.

## Followup Steps
- [ ] Test the edit functionality by navigating to edit-proveedor page and submitting changes.
- [ ] Ensure form validation works and data is updated in the database.
- [ ] Check for any console errors in the browser developer tools.
