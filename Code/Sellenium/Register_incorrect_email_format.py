import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys


class hello_login(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_search_in_python_org(self):
        driver = self.driver
        driver.get("http://172.20.10.6/register")
        username = driver.find_element_by_name("username")
        password = driver.find_element_by_name("password")
        login = driver.find_element_by_name("continue")
        username.clear()
        username.send_keys("hello")
        password.clear()
        password.send_keys("smjfas")
        login.click()

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
