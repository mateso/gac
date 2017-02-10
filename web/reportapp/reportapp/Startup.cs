using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(reportapp.Startup))]
namespace reportapp
{
    public partial class Startup {
        public void Configuration(IAppBuilder app) {
            ConfigureAuth(app);
        }
    }
}
