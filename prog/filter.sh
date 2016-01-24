#include <iostream>
#include <string>
#include <pcl/io/pcd_io.h>
#include <pcl/io/ply_io.h>
#include <pcl/point_types.h>
#include <pcl/filters/voxel_grid.h>
#include <pcl/filters/statistical_outlier_removal.h>

int
main (int argc, char** argv)
{
  if(argc < 2){
	std::cout << "One argument is expected." << std::endl;
    return (-1);
  }
  std::string filename(argv[1]);
  
  pcl::PointCloud <pcl::PointXYZRGB>::Ptr cloud (new pcl::PointCloud <pcl::PointXYZRGB>);
  pcl::PointCloud <pcl::PointXYZRGB>::Ptr cloud_filtered (new pcl::PointCloud <pcl::PointXYZRGB>);
  if ( pcl::io::loadPCDFile <pcl::PointXYZRGB> (filename, *cloud) == -1 ){
    std::cout << "Cloud reading failed." << std::endl;
    return (-1);
  }
  
  std::cerr << "Cloud before filtering: " << std::endl;
  std::cerr << *cloud << std::endl;
  
  
  // Create the VoxelGrid filtering object
  pcl::VoxelGrid<pcl::PointXYZRGB> sor1;
  sor1.setInputCloud (cloud);
  sor1.setLeafSize (0.02f, 0.02f, 0.02f);
  sor1.filter (*cloud_filtered);
  
  // Create the Outlier filtering object
  pcl::StatisticalOutlierRemoval<pcl::PointXYZRGB> sor2;
  sor2.setInputCloud (cloud_filtered);
  sor2.setMeanK (50);
  sor2.setStddevMulThresh (1.0);
  sor2.filter (*cloud_filtered);
  
  /* print result */
  std::cerr << "Cloud after filtering: " << std::endl;
  std::cerr << *cloud_filtered << std::endl;
  /* save file */
  bool ply_flag = true;
  if(ply_flag){
	pcl::PLYWriter writer;
	writer.write<pcl::PointXYZRGB> ("../tmp/out.ply", *cloud_filtered, true);
	std::cerr << "Output PointCloud as out.ply" << std::endl;
  }
  else{
	pcl::PCDWriter writer;
	writer.write<pcl::PointXYZRGB> ("../tmp/out.pcd", *cloud_filtered, false);
	std::cerr << "Output PointCloud as out.pcd" << std::endl;
  }

  return (0);
}