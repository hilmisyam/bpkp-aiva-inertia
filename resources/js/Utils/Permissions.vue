<script>
import { usePage } from '@inertiajs/vue3';

export default {
  name: 'Permissions',
  methods: {
    hasAnyPermission(permissions) {
      // destruct auth from usePage props
      const pageProps = usePage().props;
      if (!pageProps || !pageProps.auth) {
        console.log('No auth found');
        return false;
      }
      const { auth } = pageProps;

      // get all permissions from props auth
      let allPermissions = auth.permissions;

      // define has permission is false
      let hasPermission = false;

      // loop permissions
      permissions.forEach(function(item) {
        // do it if permission is match with key
        if (allPermissions[item]) {
          // assign hasPermission to true
          hasPermission = true;
        }
      });

      // console.log('Permissions checked:', permissions, 'Result:', hasPermission);
      return hasPermission;
    }
  }
};
</script>