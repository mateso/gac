using CrystalDecisions.CrystalReports.Engine;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace reportapp
{
    public partial class EntityList : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            ReportDocument report = new ReportDocument();
            report.Load(Server.MapPath("Reports/GACSENTITYLIST.rpt"));
            report.SetParameterValue("@SubSectorDescription", Request.QueryString["SubSectorDescription"]);
            CrystalReportViewer1.ReportSource = report;
        }
    }
}