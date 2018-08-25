import unittest

from selenium import webdriver
from test_utility import fields, static_data


# Assume smjfas is a registered username

class Register(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_repeated_username(self):
        driver = self.driver
        driver.get(static_data.base_url + "register")
        fields.get_components_by_name(driver, ["name=smjfas", "family=feyzabadisani", "email=smjfas@gmail.com",
                                               "person_id=1234565987", "username=smjfas", "password=hello123",
                                               "repass=hello123", "cellphone=09398604014",
                                               "address=21st number baker st.", "submit"])[9].click()

        assert "register" in driver.current_url

    def tearDown(self):
        self.driver.close()


if __name__ == "__main__":
    unittest.main()
