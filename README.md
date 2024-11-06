# AWS-Cloud-Computing

An AWS Infrastructure project

- [Current Architecture](https://lucid.app/lucidchart/394425fe-7308-494d-ad8b-2bcd1bcae4d9/edit?view_items=YccmU6vDBapR&invitationId=inv_90b168de-52be-4d68-b940-fc239d920c49)

## Key Components 

- Autoscaling : The number of EC2 instances are automatically adjusted based on the demand and is capable of handling fluctuating user taffic.
    - Uses a predifined AMI Image with a web server and a PHP application.
    - An ALB distributes traffic among the EC2 instances.
    - Autoscaling policies are set up on CPU-Utilization.
    - CloudWatch alarms trigger the scaling events.
- RDS : To host the application data 
    - Mutli-AZ deployment for high availability. 
    - Amazon KMS to encrypt the database at rest.  
- WAF (Web application firewall) : To protect the web applications from attacks like SQL injection and cross-site scripting.  
    - Uses AWS managed rules and some custom rules.
    - Monitors blocked request in WAF Logs using AWS CloudWatch.
- Encryption.
    - Uses SSL/TLS certificates (via AWS Certificate Manager) for the load balancer to ensure that all communication between clients and the web application is encrypted.
    - SSL for database connections between the web application and the RDS MySQL instance to secure data in transit.

## TODO

- CDN : To accelerate content delivery and cache static assets globally 
    - Integrate CloudFront with the applications S3 bucket for serving static assets.
    - Enable GZIP compression for assets to reduce load times.
    - Use AWS CloudWatch to monitor key performance metrics (latency, request rates) and optimize based on findings.
    - Configure cache policies for dynamic content to optimize load time and reduce load on the EC2 instances.
- Encryption : Ensure data is encrypted at rest and in transit.
- Stress Testing
    - Use a tool like Apache JMeter or AWS Load Testing to simulate varying traffic levels and observe the Auto Scaling groups behavior.
    - Monitor how RDS handles increased query loads during peak times.
- Monitoring 
    - Set up AWS CloudWatch dashboards to monitor metrics like CPU utilization, database connections, error rates, and traffic patterns.
    - Configure AWS CloudTrail to log security events and AWS Config to monitor configuration changes.
- Analyze the cost of resources using AWS Cost Explorer and make recommendations on Reserved Instances or Savings Plans for long-term cost savings.
- Use containers.
- Setting up CI/CD pipeline.




